<?php

namespace Formulario\Model;

class ActividadEconomicaPorPersona {

    private $act_eco_id;
    private $per_id;

    public function getAct_eco_id() {
        return $this->act_eco_id;
    }

    public function setAct_eco_id($act_eco_id) {
        $this->act_eco_id = $act_eco_id;
    }

    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function exchangeArray($data) {
        $this->act_eco_id = (isset($data['act_eco_id'])) ? $data['act_eco_id'] : null;
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}