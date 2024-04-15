<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $courses = Course::getCourses();

        // se o usuario busca algum curso especifico
        if ($request->search) {
            $courses = Course::getCoursesWithSearch($request->search);
        }

        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request, Course $course)
    {
        $course->fill($request->validated());
        Course::setCourse($course);

        return redirect()->route('dashboard')->with('msg', 'Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::getCourse($id);

        if (!$course) {
            // se o curso não for encontrado, o usuário é redirecionado para o index
            return redirect()->route('courses.index');
        }

        return view("courses.show", ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::getCourse($id);

        if (!$course) {
            // se o curso não for encontrado, o usuário é redirecionado para o index
            return redirect()->route('courses.index');
        }

        return view('courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::getCourse($id);

        $new_course = [
            "name" => $request->name,
            "description" => $request->description,
            "value" => $request->value,
            "max_inscriptions" => $request->max_inscriptions,
            "start_inscriptions" => $request->start_inscriptions,
            "end_inscriptions" => $request->end_inscriptions,
            "material_file" => $request->material_file
        ];
        
        if (!isset($request->material_file)) {
            $new_course['material_file'] = $course->material_file;
        }

        Course::updateCourse($course, $new_course);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::deleteCourse($id);

        return redirect()->route('dashboard')->with("msg", "Curso deletado com sucesso!");
    }

    public function dashboard()
    {
        $courses = Course::getCourses();

        return view('courses.dashboard', ['courses' => $courses]);
    }
}
