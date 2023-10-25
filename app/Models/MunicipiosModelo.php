<?php

namespace App\Models;

use CodeIgniter\Model;

class MunicipiosModelo extends Model
{
    protected $table      = 'fl_municipios';
    protected $primaryKey = 'mun_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['mun_cod', 'mun_nombre', 'dep_id', 'mun_estado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'mun_fecha_alta';
    protected $updatedField  = 'mun_fecha_edit';
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

    public function getMunicipios($idDepto)
    {
        $paramMuni = array(
            'dep_id' => $idDepto,
            'mun_estado' => 'A'
        );
        $this->select('*');
        $this->where($paramMuni);

        $municipios = $this->get()->getRow();
        return $municipios;
    }
}
