<?php

namespace Formulario\Model;

class ReferenciasComerciales{
    
    private $per_id;
    private $ref_com_nombres;
    private $ref_com_direccion;
    private $ref_com_telefono;
    
    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getRef_com_nombres() {
        return $this->ref_com_nombres;
    }

    public function setRef_com_nombres($ref_com_nombres) {
        $this->ref_com_nombres = $ref_com_nombres;
    }

    public function getRef_com_direccion() {
        return $this->ref_com_direccion;
    }

    public function setRef_com_direccion($ref_com_direccion) {
        $this->ref_com_direccion = $ref_com_direccion;
    }

    public function getRef_com_telefono() {
        return $this->ref_com_telefono;
    }

    public function setRef_com_telefono($ref_com_telefono) {
        $this->ref_com_telefono = $ref_com_telefono;
    }

    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->ref_com_nombres = (isset($data['ref_com_nombres'])) ? $data['ref_com_nombres'] : null;
        $this->ref_com_direccion = (isset($data['ref_com_direccion'])) ? $data['ref_com_direccion'] : null;
        $this->ref_com_telefono = (isset($data['ref_com_telefono'])) ? $data['ref_com_telefono'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }
}
