<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\ReferenciasBancarias;

class ReferenciasBancariasTable {
    
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar(ReferenciasBancarias $referencia){
        $data = array(
            'per_id' => $referencia->getPer_id(),
            'ref_ban_banco' => $referencia->getRef_ban_banco(),
            'ref_ban_numero_cuenta' => $referencia->getRef_ban_numero_cuenta(),
            'ref_ban_tipo_cuenta' => $referencia->getRef_ban_tipo_cuenta(),
        );
               
        return $this->tableGateway->insert($data);
    }
}
