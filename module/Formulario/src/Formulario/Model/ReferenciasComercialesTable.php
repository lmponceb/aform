<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\ReferenciasComerciales;

class ReferenciasComercialesTable {
    
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar(ReferenciasComerciales $referencia){
        $data = array(
            'per_id' => $referencia->getPer_id(),
            'ref_com_nombres' => $referencia->getRef_com_nombres(),
            'ref_com_direccion' => $referencia->getRef_com_direccion(),
            'ref_com_telefono' => $referencia->getRef_com_telefono(),
        );
               
        return $this->tableGateway->insert($data);
    }
}
