<?php

namespace App\Models\Registrarse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Solicitud extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'registrarse_solicitudes';

    protected $primaryKey = 'idregistrarse_solicitud';

    protected $fillable = ['categoria_id', 'codigo', 'correo_electronico', 'nro_telefono', 'foto_cedula_delante', 'foto_cedula_atras', 'foto_cedula_selfie', 'estado'];

    /**
     * Relación de "uno a muchos" (inversa) con la tabla "registrarse_solicitudes_rechazadas".
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rechazadas()
    {
        return $this->hasMany(SolicitudRechazada::class);
    }
}
