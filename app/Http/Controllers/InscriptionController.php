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
        $inscriptions = Inscription::getUserInscriptionsWithCourse(Auth::user()->id);

        return view('inscriptions.index', ['inscriptions' => $inscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id, Request $request)
    {
        $course = Course::getCourse($id);
        
        // caso o usuário volte no meio do cadastro de inscrição de curso
        if ($request->session()->has('course_id')) {
            $request->session()->pull('course_id', null);
        }

        // armazenando o id numa sessão para guardar o id do curso
        $request->session()->put('course_id', $id);

        return view('inscriptions.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInscriptionRequest $request, Inscription $inscription )
    {
        $inscription->fill($request->validated());
        $inscription->course_id = $request->session()->get('course_id');
        $inscription->user_id = Auth::user()->id;
        $inscription->code = Inscription::getInscriptionCode();
        Inscription::setInscription($inscription);

        // destruindo a sessão com o id do curso
        $request->session()->pull('course_id', null);

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
        Inscription::deleteInscription($id);

        return redirect()->route('dashboard');
    }

    public function dashboard(string $id)
    {
        $inscriptions = Inscription::getCourseInscriptions($id);

        return view('inscriptions.dashboard', ['inscriptions' => $inscriptions]);
    }
}
