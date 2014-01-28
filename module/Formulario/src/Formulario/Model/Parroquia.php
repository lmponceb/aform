<?php
namespace Formulario\Model;

class Parroquia
{
    public $ciu_id;
    public $par_id;
    public $par_nombre;
    
    public function exchangeArray($data)
    {
        $this->ciu_id 	= (isset($data['ciu_id'])) ? $data['ciu_id'] : null;
        $this->par_id 	= (isset($data['par_id'])) ? $data['par_id'] : null;
        $this->par_nombre = (isset($data['par_nombre'])) ? $data['par_nombre'] : null;
    }
}