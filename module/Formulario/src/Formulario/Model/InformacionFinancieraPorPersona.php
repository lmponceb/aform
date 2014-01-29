<?php

namespace Formulario\Model;

class InformacionFinancieraPorPersona {
    
    private $per_id;
    private $inf_fin_id;
    private $inf_fin_valor;
    
    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getInf_fin_id() {
        return $this->inf_fin_id;
    }

    public function setInf_fin_id($inf_fin_id) {
        $this->inf_fin_id = $inf_fin_id;
    }

    public function getInf_fin_valor() {
        return $this->inf_fin_valor;
    }

    public function setInf_fin_valor($inf_fin_valor) {
        $this->inf_fin_valor = $inf_fin_valor;
    }

    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->inf_fin_id = (isset($data['inf_fin_id'])) ? $data['inf_fin_id'] : null;
        $this->inf_fin_valor = (isset($data['inf_fin_valor'])) ? $data['inf_fin_valor'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }
}
