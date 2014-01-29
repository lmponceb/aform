<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\TarjetasCredito;

class TarjetasCreditoTable {
    
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function guardar(TarjetasCredito $referencia){
        $data = array(
            'per_id' => $referencia->getPer_id(),
            'tar_cre_institucion' => $referencia->getTar_cre_institucion(),
            'tar_cre_numero_tarjeta' => $referencia->getTar_cre_numero_tarjeta(),
            'tar_cre_anio_socio' => $referencia->getTar_cre_anio_socio(),
        );
               
        return $this->tableGateway->insert($data);
    }
}
