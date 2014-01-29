<?php

namespace Formulario\Model;

class ReferenciasPersonales{
    
    private $per_id;
    private $ref_per_nombres;
    private $ref_per_direccion;
    private $ref_per_telefono;
    
    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getRef_per_nombres() {
        return $this->ref_per_nombres;
    }

    public function setRef_per_nombres($ref_per_nombres) {
        $this->ref_per_nombres = $ref_per_nombres;
    }

    public function getRef_per_direccion() {
        return $this->ref_per_direccion;
    }

    public function setRef_per_direccion($ref_per_direccion) {
        $this->ref_per_direccion = $ref_per_direccion;
    }

    public function getRef_per_telefono() {
        return $this->ref_per_telefono;
    }

    public function setRef_per_telefono($ref_per_telefono) {
        $this->ref_per_telefono = $ref_per_telefono;
    }

    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->ref_per_nombres = (isset($data['ref_per_nombres'])) ? $data['ref_per_nombres'] : null;
        $this->ref_per_direccion = (isset($data['ref_per_direccion'])) ? $data['ref_per_direccion'] : null;
        $this->ref_per_telefono = (isset($data['ref_per_telefono'])) ? $data['ref_per_telefono'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }
}
