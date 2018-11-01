<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaStoreRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoria::All();

        return $categorias;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(CategoriaStoreRequest $request)
    {
        //
        $data=$request->only(['tipo']);
        $categoria=\App\Categoria::create($data);
        
        return response ([
            'status'=> '201',
            'msg'=>'Categoria criado',
            'data'=>$categoria
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        
        return $categoria; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
       
    }

    public function getArticles(Categoria $categoria){

        $data=Article::with('categoria')->get()->where('categoria', $categoria); 
        return response ([
            'status'=>200,
            'data'=>$data,
            'msg'=>'OK'
        ],200);
    }
}
