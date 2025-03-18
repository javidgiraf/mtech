<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use App\Services\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $careerService;

    public function __construct(CareerService $careerService)
    {
        $this->careerService = $careerService;
    }

    public function index()
    {
        $careers = $this->careerService->getAllCareers(10);

        return view(
            'pages.admin.careers.index',
            compact('careers')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCareerRequest $request)
    {
        $this->careerService->createCareer($request->all());

        return redirect()->route('admin.careers.index')->with('success', 'Career saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        $career = $this->careerService->editCareer($career->id);

        return view(
            'pages.admin.careers.edit',
            compact('career')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        $this->careerService->updateCareer(
            $career->id,
            $request->all()
        );

        return redirect()->route('admin.careers.index')->with('success', 'Career updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $this->careerService->deleteCareer($career->id);

        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully');
    }
}
