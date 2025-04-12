<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Sector;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientService->getAllClients(10);

        return view(
            'pages.admin.clients.index',
            compact('clients')
        );
    }

    public function create()
    {
        $sectors = Sector::all();

        return view('pages.admin.clients.create', compact('sectors'));
    }

    public function store(CreateClientRequest $request)
    {
        $this->clientService->createClient($request->all());

        return redirect()->route('admin.clients.index')->with('success', 'Client saved successfully');
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        $client = $this->clientService->editClient($client->id);
        $sectors = Sector::all();

        return view(
            'pages.admin.clients.edit',
            compact('client', 'sectors')
        );
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $this->clientService->updateClient(
            $client->id,
            $request->all()
        );

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        if (!Project::where('client_id', $client->id)->exists()) {
            $this->clientService->deleteClient($client->id);

            return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully');
        } else {
            return redirect()->back()->with('error', 'This client is associated with a project and cannot be removed.');
        }
    }
}
