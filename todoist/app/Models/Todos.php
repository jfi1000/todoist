<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todos extends Model
{
    // protected $table = 'todos';
    use SoftDeletes;

    use HasFactory;

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria','id','categoria');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','id_usario');
    }
}
