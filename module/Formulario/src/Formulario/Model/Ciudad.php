<?php
namespace Formulario\Model;

class Ciudad
{
    public $ciu_id;
    public $pro_id;
    public $ciu_nombre;
    
    public function exchangeArray($data)
    {
        $this->ciu_id 	= (isset($data['ciu_id'])) ? $data['ciu_id'] : null;
        $this->pro_id 	= (isset($data['pro_id'])) ? $data['pro_id'] : null;
        $this->ciu_nombre = (isset($data['ciu_nombre'])) ? $data['ciu_nombre'] : null;
    }
}