<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class ActividadEconomicaTable{
    
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function getActividadesSelect() {

        $resultSet = $this->tableGateway->select();
        
        $result = array();
        foreach ($resultSet as $ciudad){
            $result[$ciudad->getAct_eco_id()]=$ciudad->getAct_eco_nombre();
        }
        return $result;
    }
}
