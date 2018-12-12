<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;  

class ArticleStoreRequest extends FormRequest
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
            'titulo'=>'required|unique:articles|max:30',
            'data'=>'nullable|string', 
            'descricao'=>'required|max:100',
            'autor_id'=>'required|integer',
            'categoria_id'=>'required|integer',
            'artigo_img' => 'nullable|image'
        ];
    }

    public function messages(){
        return[
            'titulo.required'=>'Título obrigatório.',
            'titulo.unique'=>'Titulo tem de ser único',
            'titulo.max'=>'Titulo no máximo pode ter 30 carateres.',
            'descricao.max'=>'Descrição no máximo pode ter 100 carateres.',
            'descricao.required'=>'Descrição obrigatória.',
            'autor_id.required'=>'O artigo tem de obrigatoriamente estar associado a um autor',
            'categoria_id.required'=>'O artigo tem de obrigatoriamente estar associado a uma categoria',
            'artigo_img.image' => 'o ficheiro tem de ser do tipo imagem'

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
