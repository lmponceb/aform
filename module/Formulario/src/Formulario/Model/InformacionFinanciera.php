<?php

namespace Formulario\Model;

class InformacionFinanciera {

    private $inf_fin_id;
    private $inf_fin_nombre;
    private $inf_fin_tipo;

    public function getInf_fin_id() {
        return $this->inf_fin_id;
    }

    public function setInf_fin_id($inf_fin_id) {
        $this->inf_fin_id = $inf_fin_id;
    }

    public function getInf_fin_nombre() {
        return $this->inf_fin_nombre;
    }

    public function setInf_fin_nombre($inf_fin_nombre) {
        $this->inf_fin_nombre = $inf_fin_nombre;
    }

    public function getInf_fin_tipo() {
        return $this->inf_fin_tipo;
    }

    public function setInf_fin_tipo($inf_fin_tipo) {
        $this->inf_fin_tipo = $inf_fin_tipo;
    }

    public function exchangeArray($data) {
        $this->inf_fin_id = (isset($data['inf_fin_id'])) ? $data['inf_fin_id'] : null;
        $this->inf_fin_nombre = (isset($data['inf_fin_nombre'])) ? $data['inf_fin_nombre'] : null;
        $this->inf_fin_tipo = (isset($data['inf_fin_tipo'])) ? $data['inf_fin_tipo'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
