<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{
    protected $fillable = [
                'src',
                'titolo',
                'tipo',
                'cottura',
                'peso',
                'descrizione'
            ];
}
