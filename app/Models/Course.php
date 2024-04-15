<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name','description', 'value', 'start_inscriptions', 'end_inscriptions', 'max_inscriptions', 'material_file'];

    protected $casts = [
        'value' => 'float'
    ];

    public static function setCourse($course)
    {
        $course->save();
    }

    public static function getCourse($id)
    {
        $course = Course::find($id);

        if (!isset($course)) {
            return false;
        }

        return $course;
    }

    public static function getCourses()
    {
        $user_id = Auth::user()->id;

        $courses = Course::whereDoesntHave('inscriptions', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return $courses;
    }

    public static function getCoursesWithSearch($search)
    {
        $user_id = Auth::user()->id;

        $courses = Course::where('name', 'LIKE', "%$search%")::whereDoesntHave('inscriptions', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return $courses;
    }

    public static function getCountCourseInscriptions($course)
    {
        $number_inscriptions = count($course->inscriptions);

        return $number_inscriptions;
    }

    public static function updateCourse($course, $new_course)
    {
        $course->update($new_course);
    }

    public static function deleteCourse($id)
    {
        Course::getCourse($id)->delete();
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }
}
