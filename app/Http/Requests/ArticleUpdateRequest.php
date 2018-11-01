<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 

class ArticleUpdateRequest extends FormRequest
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
            'titulo'=>'nullable|unique:articles|max:30',
            'data'=>'nullable|string', 
            'descricao'=>'nullable|max:100',
            'autor_id'=>'nullable',
            //'categoria_id'=>'nullable|integer'
            
        ];
    }

    public function messages(){
        return[
           
            'titulo.unique'=>'Titulo tem de ser único',
            'titulo.max'=>'Titulo no máximo pode ter 30 carateres.',
            'descricao.max'=>'Descrição no máximo pode ter 100 carateres.',
            //'categoria_id'=>'Valor inserido em categoria tem de ser um número inteiro.'

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
