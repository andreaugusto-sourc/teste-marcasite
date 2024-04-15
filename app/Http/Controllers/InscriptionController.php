<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInscriptionRequest;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::getUserInscriptions(Auth::user()->id);

        return view('inscriptions.index', ['inscriptions' => $inscriptions]);
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
        $inscription->user_id = Auth::user()->id;
        Inscription::setInscription($inscription);

        return redirect()->route('inscriptions.index')->with('msg', 'Inscrição feita com sucesso!');
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

    public function dashboard(string $id)
    {
        $inscriptions = Inscription::getCourseInscriptions($id);

        return view('inscriptions.dashboard', ['inscriptions' => $inscriptions]);
    }
}
