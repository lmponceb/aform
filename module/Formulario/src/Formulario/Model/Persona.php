<?php

namespace Formulario\Model;

class Persona {

    private $per_id;
    private $par_id;
    private $pai_id;
    private $per_documento;
    private $per_nombres;
    private $per_apellido_materno;
    private $per_apellido_paterno;
    private $per_nacimiento_lugar;
    private $per_nacimiento_fecha;
    private $per_sexo;
    private $per_dependientes;
    private $per_estado_civil;
    private $per_conyuge_nombre;
    private $per_conyuge_documento;
    private $per_barrio;
    private $per_direccion;
    private $per_tiempo_residencia;
    private $per_telefono;
    private $per_celular;
    private $per_email;
    private $per_tipo_vivienda;
    private $per_numero_empleados;
    private $per_empresa_tipo;
    private $per_empresa_producto;
    private $per_empresa_inicio;
    private $per_empresa_nombre;
    private $per_empresa_cargo;
    private $per_empresa_ruc;
    private $per_empresa_direccion;
    private $per_empresa_referencia;
    private $per_empresa_telefono;
    private $per_empresa_celular;
    private $per_empresa_email;

    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getPar_id() {
        return $this->par_id;
    }

    public function setPar_id($par_id) {
        $this->par_id = $par_id;
    }

    public function getPai_id() {
        return $this->pai_id;
    }

    public function setPai_id($pai_id) {
        $this->pai_id = $pai_id;
    }

    public function getPer_documento() {
        return $this->per_documento;
    }

    public function setPer_documento($per_documento) {
        $this->per_documento = $per_documento;
    }

    public function getPer_nombres() {
        return $this->per_nombres;
    }

    public function setPer_nombres($per_nombres) {
        $this->per_nombres = $per_nombres;
    }

    public function getPer_apellido_materno() {
        return $this->per_apellido_materno;
    }

    public function setPer_apellido_materno($per_apellido_materno) {
        $this->per_apellido_materno = $per_apellido_materno;
    }

    public function getPer_apellido_paterno() {
        return $this->per_apellido_paterno;
    }

    public function setPer_apellido_paterno($per_apellido_paterno) {
        $this->per_apellido_paterno = $per_apellido_paterno;
    }

    public function getPer_nacimiento_lugar() {
        return $this->per_nacimiento_lugar;
    }

    public function setPer_nacimiento_lugar($per_nacimiento_lugar) {
        $this->per_nacimiento_lugar = $per_nacimiento_lugar;
    }

    public function getPer_nacimiento_fecha() {
        return $this->per_nacimiento_fecha;
    }

    public function setPer_nacimiento_fecha($per_nacimiento_fecha) {
        $this->per_nacimiento_fecha = $per_nacimiento_fecha;
    }

    public function getPer_sexo() {
        return $this->per_sexo;
    }

    public function setPer_sexo($per_sexo) {
        $this->per_sexo = $per_sexo;
    }

    public function getPer_dependientes() {
        return $this->per_dependientes;
    }

    public function setPer_dependientes($per_dependientes) {
        $this->per_dependientes = $per_dependientes;
    }

    public function getPer_estado_civil() {
        return $this->per_estado_civil;
    }

    public function setPer_estado_civil($per_estado_civil) {
        $this->per_estado_civil = $per_estado_civil;
    }

    public function getPer_conyuge_nombre() {
        return $this->per_conyuge_nombre;
    }

    public function setPer_conyuge_nombre($per_conyuge_nombre) {
        $this->per_conyuge_nombre = $per_conyuge_nombre;
    }

    public function getPer_conyuge_documento() {
        return $this->per_conyuge_documento;
    }

    public function setPer_conyuge_documento($per_conyuge_documento) {
        $this->per_conyuge_documento = $per_conyuge_documento;
    }

    public function getPer_barrio() {
        return $this->per_barrio;
    }

    public function setPer_barrio($per_barrio) {
        $this->per_barrio = $per_barrio;
    }

    public function getPer_direccion() {
        return $this->per_direccion;
    }

    public function setPer_direccion($per_direccion) {
        $this->per_direccion = $per_direccion;
    }

    public function getPer_tiempo_residencia() {
        return $this->per_tiempo_residencia;
    }

    public function setPer_tiempo_residencia($per_tiempo_residencia) {
        $this->per_tiempo_residencia = $per_tiempo_residencia;
    }

    public function getPer_telefono() {
        return $this->per_telefono;
    }

    public function setPer_telefono($per_telefono) {
        $this->per_telefono = $per_telefono;
    }

    public function getPer_celular() {
        return $this->per_celular;
    }

    public function setPer_celular($per_celular) {
        $this->per_celular = $per_celular;
    }

    public function getPer_email() {
        return $this->per_email;
    }

    public function setPer_email($per_email) {
        $this->per_email = $per_email;
    }

    public function getPer_tipo_vivienda() {
        return $this->per_tipo_vivienda;
    }

    public function setPer_tipo_vivienda($per_tipo_vivienda) {
        $this->per_tipo_vivienda = $per_tipo_vivienda;
    }

    public function getPer_numero_empleados() {
        return $this->per_numero_empleados;
    }

    public function setPer_numero_empleados($per_numero_empleados) {
        $this->per_numero_empleados = $per_numero_empleados;
    }

    public function getPer_empresa_tipo() {
        return $this->per_empresa_tipo;
    }

    public function setPer_empresa_tipo($per_empresa_tipo) {
        $this->per_empresa_tipo = $per_empresa_tipo;
    }

    public function getPer_empresa_producto() {
        return $this->per_empresa_producto;
    }

    public function setPer_empresa_producto($per_empresa_producto) {
        $this->per_empresa_producto = $per_empresa_producto;
    }

    public function getPer_empresa_inicio() {
        return $this->per_empresa_inicio;
    }

    public function setPer_empresa_inicio($per_empresa_inicio) {
        $this->per_empresa_inicio = $per_empresa_inicio;
    }

    public function getPer_empresa_nombre() {
        return $this->per_empresa_nombre;
    }

    public function setPer_empresa_nombre($per_empresa_nombre) {
        $this->per_empresa_nombre = $per_empresa_nombre;
    }

    public function getPer_empresa_cargo() {
        return $this->per_empresa_cargo;
    }

    public function setPer_empresa_cargo($per_empresa_cargo) {
        $this->per_empresa_cargo = $per_empresa_cargo;
    }

    public function getPer_empresa_ruc() {
        return $this->per_empresa_ruc;
    }

    public function setPer_empresa_ruc($per_empresa_ruc) {
        $this->per_empresa_ruc = $per_empresa_ruc;
    }

    public function getPer_empresa_direccion() {
        return $this->per_empresa_direccion;
    }

    public function setPer_empresa_direccion($per_empresa_direccion) {
        $this->per_empresa_direccion = $per_empresa_direccion;
    }

    public function getPer_empresa_referencia() {
        return $this->per_empresa_referencia;
    }

    public function setPer_empresa_referencia($per_empresa_referencia) {
        $this->per_empresa_referencia = $per_empresa_referencia;
    }

    public function getPer_empresa_telefono() {
        return $this->per_empresa_telefono;
    }

    public function setPer_empresa_telefono($per_empresa_telefono) {
        $this->per_empresa_telefono = $per_empresa_telefono;
    }

    public function getPer_empresa_celular() {
        return $this->per_empresa_celular;
    }

    public function setPer_empresa_celular($per_empresa_celular) {
        $this->per_empresa_celular = $per_empresa_celular;
    }

    public function getPer_empresa_email() {
        return $this->per_empresa_email;
    }

    public function setPer_empresa_email($per_empresa_email) {
        $this->per_empresa_email = $per_empresa_email;
    }

    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->par_id = (isset($data['par_id'])) ? $data['par_id'] : null;
        $this->pai_id = (isset($data['pai_id'])) ? $data['pai_id'] : null;
        $this->per_documento = (isset($data['per_documento'])) ? $data['per_documento'] : null;
        $this->per_nombres = (isset($data['per_nombres'])) ? $data['per_nombres'] : null;
        $this->per_apellido_materno = (isset($data['per_apellido_materno'])) ? $data['per_apellido_materno'] : null;
        $this->per_apellido_paterno = (isset($data['per_apellido_paterno'])) ? $data['per_apellido_paterno'] : null;
        $this->per_nacimiento_lugar = (isset($data['per_nacimiento_lugar'])) ? $data['per_nacimiento_lugar'] : null;
        $this->per_nacimiento_fecha = (isset($data['per_nacimiento_fecha'])) ? $data['per_nacimiento_fecha'] : null;
        $this->per_sexo = (isset($data['per_sexo'])) ? $data['per_sexo'] : null;
        $this->per_dependientes = (isset($data['per_dependientes'])) ? $data['per_dependientes'] : null;
        $this->per_estado_civil = (isset($data['per_estado_civil'])) ? $data['per_estado_civil'] : null;
        $this->per_conyuge_nombre = (isset($data['per_conyuge_nombre'])) ? $data['per_conyuge_nombre'] : null;
        $this->per_conyuge_documento = (isset($data['per_conyuge_documento'])) ? $data['per_conyuge_documento'] : null;
        $this->per_barrio = (isset($data['per_barrio'])) ? $data['per_barrio'] : null;
        $this->per_direccion = (isset($data['per_direccion'])) ? $data['per_direccion'] : null;
        $this->per_tiempo_residencia = (isset($data['per_tiempo_residencia'])) ? $data['per_tiempo_residencia'] : null;
        $this->per_telefono = (isset($data['per_telefono'])) ? $data['per_telefono'] : null;
        $this->per_celular = (isset($data['per_celular'])) ? $data['per_celular'] : null;
        $this->per_email = (isset($data['per_email'])) ? $data['per_email'] : null;
        $this->per_tipo_vivienda = (isset($data['per_tipo_vivienda'])) ? $data['per_tipo_vivienda'] : null;
        $this->per_numero_empleados = (isset($data['per_numero_empleados'])) ? $data['per_numero_empleados'] : null;
        $this->per_empresa_tipo = (isset($data['per_empresa_tipo'])) ? $data['per_empresa_tipo'] : null;
        $this->per_empresa_producto = (isset($data['per_empresa_producto'])) ? $data['per_empresa_producto'] : null;
        $this->per_empresa_inicio = (isset($data['per_empresa_inicio'])) ? $data['per_empresa_inicio'] : null;
        $this->per_empresa_nombre = (isset($data['per_empresa_nombre'])) ? $data['per_empresa_nombre'] : null;
        $this->per_empresa_cargo = (isset($data['per_empresa_cargo'])) ? $data['per_empresa_cargo'] : null;
        $this->per_empresa_ruc = (isset($data['per_empresa_ruc'])) ? $data['per_empresa_ruc'] : null;
        $this->per_empresa_direccion = (isset($data['per_empresa_direccion'])) ? $data['per_empresa_direccion'] : null;
        $this->per_empresa_referencia = (isset($data['per_empresa_referencia'])) ? $data['per_empresa_referencia'] : null;
        $this->per_empresa_telefono = (isset($data['per_empresa_telefono'])) ? $data['per_empresa_telefono'] : null;
        $this->per_empresa_celular = (isset($data['per_empresa_celular'])) ? $data['per_empresa_celular'] : null;
        $this->per_empresa_email = (isset($data['per_empresa_email'])) ? $data['per_empresa_email'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}