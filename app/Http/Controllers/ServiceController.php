<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Services\WebService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $webService;

    public function __construct(WebService $webService)
    {
        $this->webService = $webService;
    }
    
    public function index()
    {
        $services = $this->webService->getAllServices(10);

        return view('pages.admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('pages.admin.services.create');
    }

    public function store(CreateServiceRequest $request)
    {
        $this->webService->createService($request->all());

        return redirect()->route('admin.services.index')->with('success', 'Service saved successfully');
    }

    public function show(Service $service)
    {
        
    }

    public function edit(Service $service)
    {
        $service = $this->webService->editService($service->id);

        return view('pages.admin.services.edit', 
            compact('service')
        );
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {    
        $this->webService->updateService(
            $service->id, 
            $request->all()
        );

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $this->webService->deleteService($service->id);

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
    }
}
