<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Article extends Model
{
    //
    use SoftDeletes; 

    protected $fillable = [
            'titulo', 'data', 'descricao', 'autor_id', 'categoria_id'
    ]; 

    public function autor(){
        return $this->belongsTo(User::class); 
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class); 
    }


}
