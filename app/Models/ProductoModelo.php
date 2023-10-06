<?php 

namespace App\Models;
use CodeIgniter\Model;

class ProductoModelo extends Model
{
    protected $table      = 'fl_productos';
    protected $primaryKey = 'pr_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['pr_cod_pagina','pr_nombre', 'pr_descripcion','pr_precio_normal', 'pr_precio_rebajado','pr_imagen', 
    'pr_empresa','pr_estado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pr_fecha_alta';
    protected $updatedField  = 'pr_fecha_edit';
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

?>