<?php
namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\Persona;

class PersonaTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function obtenerPorCedula($per_documento)
    {
        $per_documento  = (int) $per_documento;
        $rowset = $this->tableGateway->select(array('per_documento' => $per_documento));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $per_documento");
        }
        $per_id = $row->getPer_id();
        return $per_id;
    }

    public function guardar(Persona $persona)
    {
        $data = array(
            'per_id' => $persona->getPer_id(),
            'par_id' => $persona->getPar_id(),
            'pai_id' => $persona->getPai_id(),
            'per_documento' => $persona->getPer_documento(),
            'per_nombres' => $persona->getPer_nombres(),
            'per_apellido_materno' => $persona->getPer_apellido_materno(),
            'per_apellido_paterno' => $persona->getPer_apellido_paterno(),
            'per_nacimiento_lugar' => $persona->getPer_nacimiento_lugar(),
            'per_nacimiento_fecha' => $persona->getPer_nacimiento_fecha(),
            'per_sexo' => $persona->getPer_sexo(),
            'per_dependientes' => $persona->getPer_dependientes(),
            'per_estado_civil' => $persona->getPer_estado_civil(),
            'per_conyuge_nombre' => $persona->getPer_conyuge_nombre(),
            'per_conyuge_documento' => $persona->getPer_conyuge_documento(),
            'per_barrio' => $persona->getPer_barrio(),
            'per_direccion' => $persona->getPer_direccion(),
            'per_tiempo_residencia' => $persona->getPer_tiempo_residencia(),
            'per_telefono' => $persona->getPer_telefono(),
            'per_celular' => $persona->getPer_celular(),
            'per_email' => $persona->getPer_email(),
            'per_tipo_vivienda' => $persona->getPer_tipo_vivienda(),
            'per_numero_empleados' => $persona->getPer_numero_empleados(),
            'per_empresa_tipo' => $persona->getPer_empresa_tipo(),
            'per_empresa_producto' => $persona->getPer_empresa_producto(),
            'per_empresa_inicio' => $persona->getPer_empresa_inicio(),
            'per_empresa_nombre' => $persona->getPer_empresa_nombre(),
            'per_empresa_cargo' => $persona->getPer_empresa_cargo(),
            'per_empresa_ruc' => $persona->getPer_empresa_ruc(),
            'per_empresa_direccion' => $persona->getPer_empresa_direccion(),
            'per_empresa_referencia' => $persona->getPer_empresa_referencia(),
            'per_empresa_telefono' => $persona->getPer_empresa_telefono(),
            'per_empresa_celular' => $persona->getPer_empresa_celular(),
            'per_empresa_email' => $persona->getPer_empresa_email()
        );
        
        return $this->tableGateway->insert($data);

    }

}