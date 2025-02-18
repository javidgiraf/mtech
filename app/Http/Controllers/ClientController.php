<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
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

        return view('pages.admin.clients.index', 
            compact('clients')
        );
    }

    public function create()
    {
        return view('pages.admin.clients.create');
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

        return view('pages.admin.clients.edit', 
            compact('client')
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
        $this->clientService->deleteClient($client->id);

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully');
    }
}
