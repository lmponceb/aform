<?php
namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class FormularioTable
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

    public function getFormulario($per_id)
    {
        $per_id  = (int) $per_id;
        $rowset = $this->tableGateway->select(array('per_id' => $per_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $per_id");
        }
        return $row;
    }

    public function saveFormulario(Formulario $formulario)
    {
        $data = array(
            'per_id' => $formulario->per_id,
            'par_id' => $formulario->par_id,
            'pai_id' => $formulario->pai_id,
            'per_documento' => $formulario->per_documento,
            'per_nombres' => $formulario->per_nombres,
            'per_apellido_materno' => $formulario->per_apellido_materno,
            'per_apellido_paterno' => $formulario->per_apellido_paterno,
            'per_nacimiento_lugar' => $formulario->per_nacimiento_lugar,
            'per_nacimiento_fecha' => $formulario->per_nacimiento_fecha,
            'per_sexo' => $formulario->per_sexo,
            'per_dependientes' => $formulario->per_dependientes,
            'per_estado_civil' => $formulario->per_estado_civil,
            'per_conyuge_nombre' => $formulario->per_conyuge_nombre,
            'per_conyuge_documento' => $formulario->per_conyuge_documento,
            'per_barrio' => $formulario->per_barrio,
            'per_direccion' => $formulario->per_direccion,
            'per_tiempo_residencia' => $formulario->per_tiempo_residencia,
            'per_telefono' => $formulario->per_telefono,
            'per_celular' => $formulario->per_celular,
            'per_email' => $formulario->per_email,
            'per_tipo_vivienda' => $formulario->per_tipo_vivienda,
            'per_numero_empleados' => $formulario->per_numero_empleados,
            'per_empresa_tipo' => $formulario->per_empresa_tipo,
            'per_empresa_producto' => $formulario->per_empresa_producto,
            'per_empresa_inicio' => $formulario->per_empresa_inicio,
            'per_empresa_nombre' => $formulario->per_empresa_nombre,
            'per_empresa_cargo' => $formulario->per_empresa_cargo,
            'per_empresa_ruc' => $formulario->per_empresa_ruc,
            'per_empresa_direccion' => $formulario->per_empresa_direccion,
            'per_empresa_referencia' => $formulario->per_empresa_referencia,
            'per_empresa_telefono' => $formulario->per_empresa_telefono,
            'per_empresa_celular' => $formulario->per_empresa_celular,
            'per_empresa_email' => $formulario->per_empresa_email

        );

        $per_id = (int)$formulario->per_id;
        if ($per_id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($per_id)) {
                $this->tableGateway->update($data, array('per_id' => $per_id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

}