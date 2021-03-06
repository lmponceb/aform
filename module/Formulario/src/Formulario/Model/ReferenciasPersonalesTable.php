<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\ReferenciasPersonales;

class ReferenciasPersonalesTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar(ReferenciasPersonales $referencia){
        $data = array(
            'per_id' => $referencia->getPer_id(),
            'ref_per_nombres' => $referencia->getRef_per_nombres(),
            'ref_per_direccion' => $referencia->getRef_per_direccion(),
            'ref_per_telefono' => $referencia->getRef_per_telefono(),
        );
               
        return $this->tableGateway->insert($data);
    }

}
