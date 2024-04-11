<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$comics = config("comics");

      / possiamo lasciarci dei messaggi in console con questo comando:
        // questo comando ci lascia il messaggio solo quando il file in cui è scritto viene eseguito
        // infatti in questo caso dobbiamo lanciare da terminale il comando per fare il seed, altrimenti non lo leggeremmo
        // $this->command->info(print_r($pastas));


        foreach($comics as $comic) {
            $newComic = new Comic();

            $newComic->src = $comic['src'];
            $newComic->title = $comic['titolo'];
            $newComic->description = $comic['descrizione'];
            $newComic->type = $comic['tipo'];
            $newComic->cooking_time = $comic['cottura'];
            $newComic->weight = $comic['peso'];

            $newComic->save();

        } */
    }
}
