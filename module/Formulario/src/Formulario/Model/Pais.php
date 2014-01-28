<?php
namespace Formulario\Model;

class Pais
{
    public $pai_id;
    public $pai_nombre;

    public function exchangeArray($data)
    {
        $this->pai_id     = (isset($data['pai_id'])) ? $data['pai_id'] : null;
        $this->pai_nombre     = (isset($data['pai_nombre'])) ? $data['pai_nombre'] : null;
   
    }
}