<?php 

namespace App\Models;
use CodeIgniter\Model;

class ClienteModelo extends Model
{
    protected $table      = 'fl_clientes';
    protected $primaryKey = 'cl_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cl_nombres', 'cl_apellidos','cl_telefono',  'cl_nit','cl_fecha_up', 
    'cl_correo', 'cl_pedidos', 'cl_pais', 'fk_empresa', 'cl_estado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'cl_fecha_alta';
    protected $updatedField  = 'cl_fecha_edit';
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