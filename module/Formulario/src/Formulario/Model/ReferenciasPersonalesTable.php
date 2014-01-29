<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class ReferenciasPersonalesTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar($per_id,$ref_per_nombres,$ref_per_direccion,$ref_per_telefono){
        $data = array(
            'per_id' => $per_id,
            'ref_per_nombres' => $ref_per_nombres,
            'ref_per_direccion' => $ref_per_direccion,
            'ref_per_telefono' => $ref_per_telefono,
        );
        
        return $this->tableGateway->insert($data);
    }

}
