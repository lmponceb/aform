<?php

namespace Formulario\Form;

class CedulaValidator extends \Zend\Validator\AbstractValidator {

    const CEDULA = 'CEDULA';

    protected $messageTemplates = array(
        self::CEDULA => 'Cédula no es válida',
    );

    public function __construct(array $options = array()) {
        parent::__construct($options);
    }

    public function isValid($value) {
        $this->setValue($value);

        $cedula = $this->cedula($value);
        if (!$cedula) {
            $this->error(self::CEDULA);
            return false;
        }

        return true;
    }
    
    public function cedula($value){
        $string = $value;
        $tamano = strlen($string);
        $cedula = substr($string,1);
        $provincia = substr($string,0,2);
           
        if($tamano == 10){
            if($provincia >= 1 && $provincia <= 24){
                $ultimo = substr($string,-1,1);
                $pares =array();
                $impares = array();
                for($i = 0; $i < $tamano - 1; $i++){
                    if ($i%2==0){
                        $impares[] = substr($string,$i,1);
                    }else{
                        $pares[] = substr($string,$i,1);
                        }                 
                }
                $timpares = array();
                foreach($impares as $impar){
                    $impar = $impar * 2;
                    if($impar > 9){
                        $timpares[] = $impar - 9;
                    }else{
                        $timpares[] = $impar;
                    }
                }
                
                $total = array_sum($pares) + array_sum($timpares);
                $primero = substr($total,0,1);
                $primero = ($primero + 1) * 10;
                $digito = $primero - $total;
                
                if($digito == 10){
                    $digito = '0';
                }
                
                if($digito == $ultimo){
                    return true;
                    $resultado = 'Cédula correcta';
                }else{
                    return false;
                    $resultado = 'Cédula incorrecta';
                }
            }else{
                return false;
            }
        }
    }

}