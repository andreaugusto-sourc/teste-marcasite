<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = ['code','email', 'address', 'company', 'phone', 'telephone', 'category','status','value', 'password', 'course_id','user_id'];

    protected $casts = [
        'value' => 'float'
    ];

    public static function getInscriptionCode() {
        // Gera uma sequência de números aleatórios com 5 dígitos
        $sequency = rand(10000, 99999);

        // Combina o ano e a sequência para formar o número de inscrição
        $code = date('dmy') . "$sequency";
        
        return $code;
    }

    public static function setInscription($inscription)
    {
        $inscription->save();
    }

    public static function getInscription($id)
    {
        $inscription = Inscription::find($id);

        if (!isset($inscription)) {
            return false;
        }

        return $inscription;
    }

    public static function getInscriptions()
    {
        $inscriptions = Inscription::all();

        return $inscriptions;
    }

    public static function getCourseInscriptions($course_id)
    {
        $inscriptions = Inscription::with('user')->where('course_id', $course_id)->get();

        return $inscriptions;
    }

    public static function getCourseInscriptionsWithSearch($course_id, $request)
    {
        $inscriptions = Inscription::with('user')->whereHas('user', function ($query) use ($request) {
            $query->where('name', 'LIKE', "%$request->name%");
        })->where([
            ['course_id', $course_id] , ['category', 'LIKE', "%$request->category%"], ['status', $request->status]
        ])->get();

        return $inscriptions;
    }

    public static function getUserInscriptionsWithCourse($user_id)
    {
        $inscriptions = Inscription::with('course')->where('user_id', $user_id)->get();

        return $inscriptions;
    }

    public static function deleteInscription($id)
    {
        Inscription::getInscription($id)->delete();
    }

    public static function updateInscription($id, $data)
    {
        Inscription::getInscription($id)->update($data);
    }

    public static function payInscription($id)
    {
        Inscription::getInscription($id)->update(['status' => 'Pago']);
    }

    public static function cancelInscription($id)
    {
        Inscription::getInscription($id)->update(['status' => 'Cancelado']);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
