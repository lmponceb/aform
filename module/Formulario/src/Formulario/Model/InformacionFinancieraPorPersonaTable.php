<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

use Formulario\Model\InformacionFinancieraPorPersona as FinancieraPorPersona;

class InformacionFinancieraPorPersonaTable {
    
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar($per_id,$inf_fin_id,$inf_fin_valor){
        
        $data = array(
            'per_id' => $per_id,
            'inf_fin_id' => $inf_fin_id,
            'inf_fin_valor' => $inf_fin_valor
        );
        
        return $this->tableGateway->insert($data);
    }
}
