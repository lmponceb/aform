<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class InformacionFinancieraTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function getIngresosEgresos($data,$inf_fin_tipo){
        $resultSet = $this->tableGateway->select(array('inf_fin_tipo' => $inf_fin_tipo));
        
        $result = array();
        foreach($resultSet as $ie){
            $result[$ie->getInf_fin_id()] = $ie->getInf_fin_nombre();
        }
        
        return $result;
    }

}
