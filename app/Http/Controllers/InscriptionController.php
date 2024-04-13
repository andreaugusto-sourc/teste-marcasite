<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInscriptionRequest;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::getCourses();

        return view('inscriptions.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInscriptionRequest $request, Inscription $inscription )
    {
        $inscription->fill($request->validated());
        dd($inscription);
        Inscription::setInscription($inscription);

        return redirect()->route('courses.index')->with('msg', 'Inscrição feita com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
