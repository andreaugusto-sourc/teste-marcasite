<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'address', 'company', 'phone', 'telephone', 'category', 'password', 'course_id','user_id'];

    public static function setInscription($inscription)
    {
        $inscription->save();
    }

    public static function getInscriptions()
    {
        $inscriptions = Inscription::all();

        return $inscriptions;
    }

    public static function getCourseInscriptions($course_id)
    {
        $inscriptions = Course::getCourse($course_id)->inscriptions;

        return $inscriptions;
    }

    public static function getUserInscriptions($user_id)
    {
        $inscriptions = User::getUser($user_id)->inscriptions;

        return $inscriptions;
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
