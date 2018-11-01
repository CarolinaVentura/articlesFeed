<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
            'name'=>'required',
            'email'=>'required|unique:users|email', 
            'password'=>'required|min:6'
            
        ];
    }

    public function messages(){
        return[

            'name.required'=>'Nome obrigatório.',
            'email.unique'=>'Email tem de ser único.',
            'email.email'=>'O email que prencheu não tem o formato correto.',
            'password.min'=>'A password tem de ter no mínimo 6 carateres.',
            'email.required'=>'Email obrigatório.',
            'password.required'=>'Password obrigatório.'

        ]; 
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json(
                ['status' =>422,
                'data'=>$validator->errors(),
                'msg'=>'Erro de validação'
            ], 422
            )
        );
    }
}
