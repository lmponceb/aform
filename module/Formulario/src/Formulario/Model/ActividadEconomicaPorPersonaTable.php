<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\ActividadEconomicaPorPersona;

class ActividadEconomicaPorPersonaTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar(ActividadEconomicaPorPersona $actividad){
        $data = array(
            'act_eco_id' => $actividad->getAct_eco_id(),
            'per_id' => $actividad->getPer_id(),
        );
        
        return $this->tableGateway->insert($data);
    }
    
    public function obtenerPorCedula($per_documendo){
        $rowset = $this->tableGateway->select(array('per_documento' => $per_documendo));
        $row = $rowset->current();
        
        return $row;
    }


}
