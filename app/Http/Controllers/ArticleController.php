<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest; 

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::All();

        return $articles;
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
     */
    public function store(ArticleStoreRequest $request)
    {
        //
        $data=$request->only(['titulo', 'data','descricao','autor_id']);
        $article=\App\Article::create($data);
        
        return response ([
            'status'=> '201',
            'msg'=>'Artigo criado',
            'data'=>$article
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, Article $article)
    {
       $data= $request -> only(['titulo','data','descricao','autor_id']);
       
       //verificar se o campo titulo,data e descricao foram preenchidos
       if($request->only(['titulo'])){
           $article->titulo=$data['titulo'];
       }

        if($request->only(['data'])){
            $article->data=$data['data'];
        }

        if($request->only(['descricao'])){
            $article->descricao=$data['descricao'];
        }

        if($request->only(['autor_id'])){
            $article->autor_id=$data['autor_id'];
        }

       


        $article->save();

        return response ([
            'status'=> '200',
            'msg'=>'Ok',
            'data'=>$article
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete(); 
        return response ([
            'status'=>200,
            'data'=>$article,
            'msg'=>'Artigo eliminado'
        ]);
    }
}
