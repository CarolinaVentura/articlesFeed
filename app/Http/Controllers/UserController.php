<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::All();

        return $users;
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
    public function store(UserStoreRequest $request)
    {
        //
        $data=$request->only('name', 'email','password');
        $data['password']=bcrypt($data['password']);
        $user=\App\User::create($data);
       
        return response ([
            'status'=> '201',
            'msg'=>'Utilizador criado',
            'data'=>$user
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data= $request -> only(['name','email','password']);
       
       //verificar se o campo titulo,data e descricao foram preenchidos
       if($request->only(['name'])){
           $user->name=$data['name'];
       }

        if($request->only(['email'])){
            $user->email=$data['email'];
        }

        if($request->only(['password'])){
            $user->password=bcrypt($data['password']);
        }

        $user->save();

        return response ([
            'status'=> '200',
            'msg'=>'Ok',
            'data'=>$user
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); 
        return response ([
            'status'=>200,
            'data'=>$user,
            'msg'=>'Utilizador eliminado'
        ],200);
    }

    public function showArticles(User $user){

        $data=Article::with('autor')->get()->where('autor', $user); 
        return response ([
            'status'=>200,
            'data'=>$data,
            'msg'=>'OK'
        ],200);
    }
}
