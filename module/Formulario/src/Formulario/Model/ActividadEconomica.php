<?php

namespace Formulario\Model;

class ActividadEconomica {

    private $act_eco_id;
    private $act_eco_tipo;
    private $act_eco_nombre;

    public function getAct_eco_id() {
        return $this->act_eco_id;
    }

    public function setAct_eco_id($act_eco_id) {
        $this->act_eco_id = $act_eco_id;
    }

    public function getAct_eco_tipo() {
        return $this->act_eco_tipo;
    }

    public function setAct_eco_tipo($act_eco_tipo) {
        $this->act_eco_tipo = $act_eco_tipo;
    }

    public function getAct_eco_nombre() {
        return $this->act_eco_nombre;
    }

    public function setAct_eco_nombre($act_eco_nombre) {
        $this->act_eco_nombre = $act_eco_nombre;
    }

    public function exchangeArray($data) {
        $this->act_eco_id = (isset($data['act_eco_id'])) ? $data['act_eco_id'] : null;
        $this->act_eco_tipo = (isset($data['act_eco_tipo'])) ? $data['act_eco_tipo'] : null;
        $this->act_eco_nombre = (isset($data['act_eco_nombre'])) ? $data['act_eco_nombre'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
