<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;

class VtPersonales extends Model
{
    protected $connection = "db_personal";

    protected $table = "vt_personales";

    protected $primaryKey = 'idpersonal';
}
