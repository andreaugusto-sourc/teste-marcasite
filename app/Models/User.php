<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getUser($id)
    {
        $user = User::find($id);

        return $user;
    }

    public static function cleanCPF($cpf) {
        // Remove todos os caracteres que não sejam dígitos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        
        return $cpf;
    }

    public static function getUserFirstName() {
        // Divide a string em partes usando o espaço como delimitador
        $full_name_array = explode(" ", Auth::user()->name);
        
        // Pega o primeiro elemento do array resultante
        $first_name = $full_name_array[0];
        
        return $first_name;
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }
}
