<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class SituacionFinancieraPorPersonaTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar($per_id,$sit_fin_id,$sit_fin_valor){
        $data = array(
            'per_id' => $per_id,
            'sit_fin_id' => $sit_fin_id,
            'sit_fin_valor' => $sit_fin_valor
        );
        
        return $this->tableGateway->insert($data);
    }

}
