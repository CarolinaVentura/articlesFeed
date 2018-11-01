<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Article::create([
            'titulo'=>'Porrada na rotunda do marquês',
            'data'=>'20/10/2018',
            'descricao'=>'Foi porrada da velha...',
            'autor_id'=>1,
            'categoria_id'=>6
           
        ]);

        \App\Article::create([
            'titulo'=>'Nova aplicação móvel',
            'data'=>'22/10/2018',
            'descricao'=>'Nova aplicação móvel que promete revolucionar a forma como consome!',
            'autor_id'=>2,
            'categoria_id'=>2
            
        ]);

       
        
    }
}
