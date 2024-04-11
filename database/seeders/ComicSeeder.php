<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config("comics"); //il comics tra le parentesi combacia col nome del file che contiene i dati nella cartella config

      // possiamo lasciarci dei messaggi in console con questo comando
      // $this->command->info(print_r($comics));
      //per vedere tutto bisogna scrivere nel terminale: "php artisan db:seed"
        // questo comando ci lascia il messaggio solo quando il file in cui è scritto viene eseguito
        // infatti in questo caso dobbiamo lanciare da terminale il comando per fare il seed, altrimenti non lo leggeremmo
         
      
         foreach($comics as $comic) {
            $newComic = new Comic();

            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $newComic->price = $comic['price'];
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->type = $comic['type'];
            $newComic->artists = implode(' , ', $comic['artists']);
            $newComic->writers = implode(' , ', $comic['writers']);


            $newComic->save();

        } 
    }
}
