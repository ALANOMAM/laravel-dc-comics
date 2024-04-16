<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//il pezzo sotto delle soft deletes trasporta con se questo percorso
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use HasFactory;

    //pezzo aggiunto apposta per le soft deletes 
    use SoftDeletes;
}
