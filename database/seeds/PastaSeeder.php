<?php

use Illuminate\Database\Seeder;
use App\Pasta;

class PastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elencoFormati = config('pasta');

        foreach($elencoFormati as $formato) {
            $newPasta = new Pasta();
            $newPasta->src = $formato['src'];
            $newPasta->titolo = $formato['titolo'];
            $newPasta->tipo = $formato['tipo'];
            $newPasta->cottura = $formato['cottura'];
            $newPasta->peso = $formato['peso'];
            $newPasta->descrizione = $formato['descrizione'];
            $newPasta->save();
        }
        
    }
}
