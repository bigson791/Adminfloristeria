<?php 

namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table      = 'fl_usuarios';
    protected $primaryKey = 'us_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['us_nombres', 'us_apellidos', 'us_rol','us_id_caja',
    'us_empresa','us_usuario', 'us_passwrd', 'us_estado', 'us_sucursal'];   

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'us_fe_creacion';
    protected $updatedField  = 'us_fe_edit';
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