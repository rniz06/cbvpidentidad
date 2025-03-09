<?php

namespace App\Models\Registrarse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class SolicitudRechazada extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'registrarse_solicitudes_rechazadas';

    protected $primaryKey = 'id_solicitud_rechazada';

    protected $fillable = ['solicitud_id', 'motivo'];

    /**
     * Relación de "uno a muchos" con la tabla "registrarse_solicitudes".
     * Cada registro de este modelo pertenece a una solicitud específica a través del campo "solicitud_id".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function registrarseSolicitud()
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id');
    }
}
