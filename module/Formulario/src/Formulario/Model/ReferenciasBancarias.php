<?php

namespace Formulario\Model;

class ReferenciasBancarias{
    
    private $per_id;
    private $ref_ban_banco;
    private $ref_ban_numero_cuenta;
    private $ref_ban_tipo_cuenta;
    
    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getRef_ban_banco() {
        return $this->ref_ban_banco;
    }

    public function setRef_ban_banco($ref_ban_banco) {
        $this->ref_ban_banco = $ref_ban_banco;
    }

    public function getRef_ban_numero_cuenta() {
        return $this->ref_ban_numero_cuenta;
    }

    public function setRef_ban_numero_cuenta($ref_ban_numero_cuenta) {
        $this->ref_ban_numero_cuenta = $ref_ban_numero_cuenta;
    }

    public function getRef_ban_tipo_cuenta() {
        return $this->ref_ban_tipo_cuenta;
    }

    public function setRef_ban_tipo_cuenta($ref_ban_tipo_cuenta) {
        $this->ref_ban_tipo_cuenta = $ref_ban_tipo_cuenta;
    }

    
    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->ref_ban_banco = (isset($data['ref_ban_banco'])) ? $data['ref_ban_banco'] : null;
        $this->ref_ban_numero_cuenta = (isset($data['ref_ban_numero_cuenta'])) ? $data['ref_ban_numero_cuenta'] : null;
        $this->ref_ban_tipo_cuenta = (isset($data['ref_ban_tipo_cuenta'])) ? $data['ref_ban_tipo_cuenta'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }
}
