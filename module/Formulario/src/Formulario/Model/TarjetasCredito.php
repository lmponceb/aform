<?php

namespace Formulario\Model;

class TarjetasCredito{
    
    private $per_id;
    private $tar_cre_institucion;
    private $tar_cre_numero_tarjeta;
    private $tar_cre_anio_socio;
    
    public function getPer_id() {
        return $this->per_id;
    }

    public function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    public function getTar_cre_institucion() {
        return $this->tar_cre_institucion;
    }

    public function setTar_cre_institucion($tar_cre_institucion) {
        $this->tar_cre_institucion = $tar_cre_institucion;
    }

    public function getTar_cre_numero_tarjeta() {
        return $this->tar_cre_numero_tarjeta;
    }

    public function setTar_cre_numero_tarjeta($tar_cre_numero_tarjeta) {
        $this->tar_cre_numero_tarjeta = $tar_cre_numero_tarjeta;
    }

    public function getTar_cre_anio_socio() {
        return $this->tar_cre_anio_socio;
    }

    public function setTar_cre_anio_socio($tar_cre_anio_socio) {
        $this->tar_cre_anio_socio = $tar_cre_anio_socio;
    }

    public function exchangeArray($data) {
        $this->per_id = (isset($data['per_id'])) ? $data['per_id'] : null;
        $this->tar_cre_institucion = (isset($data['tar_cre_institucion'])) ? $data['tar_cre_institucion'] : null;
        $this->tar_cre_numero_tarjeta = (isset($data['tar_cre_numero_tarjeta'])) ? $data['tar_cre_numero_tarjeta'] : null;
        $this->tar_cre_anio_socio = (isset($data['tar_cre_anio_socio'])) ? $data['tar_cre_anio_socio'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }
}
