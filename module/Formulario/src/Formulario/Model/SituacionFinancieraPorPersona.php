<?php

namespace Formulario\Model;

class SituacionFinancieraPorPersona {

    private $per_id;
    private $sit_fin_id;
    private $sit_fin_valor;

    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getSit_fin_id() {
        return $this->sit_fin_id;
    }

    public function setSit_fin_id($sit_fin_id) {
        $this->sit_fin_id = $sit_fin_id;
    }

    public function getSit_fin_valor() {
        return $this->sit_fin_valor;
    }

    public function setSit_fin_valor($sit_fin_valor) {
        $this->sit_fin_valor = $sit_fin_valor;
    }

    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->sit_fin_id = (isset($data['sit_fin_id'])) ? $data['sit_fin_id'] : null;
        $this->sit_fin_valor = (isset($data['sit_fin_valor'])) ? $data['sit_fin_valor'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
