<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'unique:inscriptions|required',
            'address' => 'required',
            'company' => 'max:60',
            'phone' => 'required | size:11',
            'telephone' => 'nullable | size:8',
            'category' => 'required',
            'password' => 'required| min:8 | max:16'
        ];
    }
}
