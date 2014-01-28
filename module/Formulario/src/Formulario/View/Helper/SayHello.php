<?php 
namespace Formulario\View\Helper;
use Zend\View\Helper\AbstractHelper;
 
class SayHello extends AbstractHelper{
 
    public function __invoke($name = 'Unnamed'){
        return "$name , this is Zend Framework 2 View Helper";
    }
}