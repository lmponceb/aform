<?php
namespace Formulario\Model;

class Formulario
{
    
    public $per_id;
    public $par_id;
    public $pai_id;
    public $per_documento;
    public $per_nombres;
    public $per_apellido_materno;
    public $per_apellido_paterno;
    public $per_nacimiento_lugar;
    public $per_nacimiento_fecha;
    public $per_sexo;
    public $per_dependientes;
    public $per_estado_civil;
    public $per_conyuge_nombre;
    public $per_conyuge_documento;
    public $per_barrio;
    public $per_direccion;
    public $per_tiempo_residencia;
    public $per_telefono;
    public $per_celular;
    public $per_email;
    public $per_tipo_vivienda;
    public $per_numero_empleados;
    public $per_empresa_tipo;
    public $per_empresa_producto;
    public $per_empresa_inicio;
    public $per_empresa_nombre;
    public $per_empresa_cargo;
    public $per_empresa_ruc;
    public $per_empresa_direccion;
    public $per_empresa_referencia;
    public $per_empresa_telefono;
    public $per_empresa_celular;
    public $per_empresa_email;

    public function exchangeArray($data)
    {
        $this->per_id     = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->par_id     = (isset($data['par_id'])) ? $data['par_id'] : null;
        $this->pai_id     = (isset($data['pai_id'])) ? $data['pai_id'] : null;
        $this->per_documento     = (isset($data['per_documento'])) ? $data['per_documento'] : null;
        $this->per_nombres     = (isset($data['per_nombres'])) ? $data['per_nombres'] : null;
        $this->per_apellido_materno     = (isset($data['per_apellido_materno'])) ? $data['per_apellido_materno'] : null;
        $this->per_apellido_paterno     = (isset($data['per_apellido_paterno'])) ? $data['per_apellido_paterno'] : null;
        $this->per_nacimiento_lugar     = (isset($data['per_nacimiento_lugar'])) ? $data['per_nacimiento_lugar'] : null;
        $this->per_nacimiento_fecha     = (isset($data['per_nacimiento_fecha'])) ? $data['per_nacimiento_fecha'] : null;
        $this->per_sexo     = (isset($data['per_sexo'])) ? $data['per_sexo'] : null;
        $this->per_dependientes     = (isset($data['per_dependientes'])) ? $data['per_dependientes'] : null;
        $this->per_estado_civil     = (isset($data['per_estado_civil'])) ? $data['per_estado_civil'] : null;
        $this->per_conyuge_nombre     = (isset($data['per_conyuge_nombre'])) ? $data['per_conyuge_nombre'] : null;
        $this->per_conyuge_documento     = (isset($data['per_conyuge_documento'])) ? $data['per_conyuge_documento'] : null;
        $this->per_barrio     = (isset($data['per_barrio'])) ? $data['per_barrio'] : null;
        $this->per_direccion     = (isset($data['per_direccion'])) ? $data['per_direccion'] : null;
        $this->per_tiempo_residencia     = (isset($data['per_tiempo_residencia'])) ? $data['per_tiempo_residencia'] : null;
        $this->per_telefono     = (isset($data['per_telefono'])) ? $data['per_telefono'] : null;
        $this->per_celular     = (isset($data['per_celular'])) ? $data['per_celular'] : null;
        $this->per_email     = (isset($data['per_email'])) ? $data['per_email'] : null;
        $this->per_tipo_vivienda     = (isset($data['per_tipo_vivienda'])) ? $data['per_tipo_vivienda'] : null;
        $this->per_numero_empleados     = (isset($data['per_numero_empleados'])) ? $data['per_numero_empleados'] : null;
        $this->per_empresa_tipo     = (isset($data['per_empresa_tipo'])) ? $data['per_empresa_tipo'] : null;
        $this->per_empresa_producto     = (isset($data['per_empresa_producto'])) ? $data['per_empresa_producto'] : null;
        $this->per_empresa_inicio     = (isset($data['per_empresa_inicio'])) ? $data['per_empresa_inicio'] : null;
        $this->per_empresa_nombre     = (isset($data['per_empresa_nombre'])) ? $data['per_empresa_nombre'] : null;
        $this->per_empresa_cargo     = (isset($data['per_empresa_cargo'])) ? $data['per_empresa_cargo'] : null;
        $this->per_empresa_ruc     = (isset($data['per_empresa_ruc'])) ? $data['per_empresa_ruc'] : null;
        $this->per_empresa_direccion     = (isset($data['per_empresa_direccion'])) ? $data['per_empresa_direccion'] : null;
        $this->per_empresa_referencia     = (isset($data['per_empresa_referencia'])) ? $data['per_empresa_referencia'] : null;
        $this->per_empresa_telefono     = (isset($data['per_empresa_telefono'])) ? $data['per_empresa_telefono'] : null;
        $this->per_empresa_celular     = (isset($data['per_empresa_celular'])) ? $data['per_empresa_celular'] : null;
        $this->per_empresa_email     = (isset($data['per_empresa_email'])) ? $data['per_empresa_email'] : null;
   
    }
}