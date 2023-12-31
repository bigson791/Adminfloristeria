<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidosModelo extends Model
{
    protected $table      = 'fl_ped_enc';
    protected $primaryKey = 'pe_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'pe_paginaweb', 'pe_cl_id', 'pe_correlativo', 'pe_fecha_pedido',
        'pe_nom_recibe', 'pe_fecha_entrega', 'pe_tel_entrega', 'pe_id_dep_entrega', 'pe_id_mun_entrega', 'pe_zona_entrega',
        'pe_precio_envio', 'pe_dir_entrega', 'pe_text_tarjeta', 'pe_observaciones', 'pe_empresa', 'pe_sucursal', 'pe_forma_pago',
        'pe_comprobante_pago', 'pe_estado', 'pe_us_realizo', 'pe_us_modifico'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pe_creacion';
    protected $updatedField  = 'pe_edicion';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
