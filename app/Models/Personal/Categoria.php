<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $connection = "db_personal";

    protected $table = "personal_categorias";

    protected $primaryKey = 'idpersonal_categorias';
}
