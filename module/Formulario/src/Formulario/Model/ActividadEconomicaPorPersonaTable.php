<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\ActividaEconomicaPorPersona as Actividad;

class ActividadEconomicaPorPersonaTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar(Actividad $actividad){
        $data = array(
            'act_eco_id' => $actividad->getAct_eco_id(),
            'per_id' => $actividad->getPer_id(),
        );
        
        return $this->tableGateway->insert($data);
    }

}
