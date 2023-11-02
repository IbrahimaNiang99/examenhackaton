<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'prenom' => 'required|min:2',
            'nom' => 'required|min:3',
            'email'=>'required|unique:users,email',
            'telephone' => 'required|min:9',
            'password' => 'required|min:9',
            'profil' => 'required|min:4',
            'etat' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        
        throw new HttpResponseException(response()->json(
            [
                'success'=>false,
                'error'=>true,
                'message'=>'Erreur de validation',
                'ErrorList'=>$validator->errors()
            ]
        ));
    }

    public function messages()
    {
        return[
            'name.required'=>'Le nom est obligatoire',
            'etat.required'=>"L'état est obligatoire",
            'profil.required'=>'Le profil est obligatoire',
            'email.required'=>'L\'adresse email est obligatoire',
            'password.required'=>'Le mot de passe est obligatoire',
            'telephone.required'=>'Le numéro de téléphone est obligatoire',
            'email.unique'=>'L\'adresse email existe déja dans la BDD'
        ];
    }
}
