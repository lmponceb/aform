<?php
namespace Formulario\Model;

class Provincia
{
    
    public $pro_id; 	
    public $pro_nombre; 
    
    public function exchangeArray($data)
    {
        $this->pro_id 	= (isset($data['pro_id'])) ? $data['pro_id'] : null;
        $this->pro_nombre = (isset($data['pro_nombre'])) ? $data['pro_nombre'] : null;
    }
}