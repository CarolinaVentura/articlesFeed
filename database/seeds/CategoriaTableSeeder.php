<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Categoria::create([
            'tipo'=>'Desporto',
            
        ]); 

        \App\Categoria::create([
            'tipo'=>'Tecnologia',
            
        ]); 

        \App\Categoria::create([
            'tipo'=>'Ciências',
            
        ]); 

        \App\Categoria::create([
            'tipo'=>'Política',
            
        ]); 

        \App\Categoria::create([
            'tipo'=>'Economia',
            
        ]); 
        \App\Categoria::create([
            'tipo'=>'Sociedade',
            
        ]); 
    }
}
