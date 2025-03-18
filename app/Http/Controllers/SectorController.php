<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Models\Project;
use App\Models\Sector;
use App\Services\SectorService;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public $sectorService;

    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }

    public function index()
    {
        $sectors = $this->sectorService->getAllSectors(10);

        return view('pages.admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('pages.admin.sectors.create');
    }

    public function store(CreateSectorRequest $request)
    {
        $this->sectorService->createSector($request->all());

        return redirect()->route('admin.sectors.index')->with('success', 'Sector saved successfully');
    }

    public function show(Sector $sector)
    {
        //
    }

    public function edit(Sector $sector)
    {
        $sector = $this->sectorService->editSector($sector->id);

        return view('pages.admin.sectors.edit', 
            compact('sector')
        );
    }

    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        $this->sectorService->updateSector(
            $sector->id, 
            $request->all()
        );

        return redirect()->route('admin.sectors.index')->with('success', 'Sector updated successfully');
    }

    public function destroy(Sector $sector)
    {
        if(!Project::where('sector_id', $sector->id)->exists()) {
            $this->sectorService->deleteSector($sector->id);

            return redirect()->route('admin.sectors.index')->with('success', 'Sector deleted successfully');
        }
        else {
            return redirect()->back()->with('error', 'This sector is associated with a project and cannot be removed.');
        }
    }
}
