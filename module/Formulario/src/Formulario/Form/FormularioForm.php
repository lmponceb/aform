<?php

namespace Formulario\Form;

use Zend\Form\Form;

class FormularioForm extends Form {

    public function __construct($name = null) {
        // we want to ignore the name passed
        parent::__construct('formulario');
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');

        $this->add(array(
            'name' => 'per_id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));


        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'pai_id',
            'attributes' => array(
                'id' => 'pai_id',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Pa&iacute;s:',
                'empty_option' => 'Escoja el pais'
            ),
        ));

        $this->add(array(
            'name' => 'per_documento',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Documento',
            ),
        ));
        $this->add(array(
            'name' => 'per_nombres',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres',
            ),
        ));
        $this->add(array(
            'name' => 'per_apellido_materno',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Apellido materno',
            ),
        ));
        $this->add(array(
            'name' => 'per_apellido_paterno',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Apellido paterno',
            ),
        ));
        $this->add(array(
            'name' => 'per_nacimiento_lugar',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Lugar de nacimiento',
            ),
        ));
        $this->add(array(
            'name' => 'per_nacimiento_fecha',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Fecha de nacimiento',
            ),
        ));


        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'per_sexo',
            'options' => array(
                'label' => 'Sexo',
                'value_options' => array(
                    'F' => 'F',
                    'M' => 'M',
                ),
            ),
            'attributes' => array(
                'id' => 'per_sexo',
                'class' => 'radio-inline',
            )
        ));





        $this->add(array(
            'name' => 'per_dependientes',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dependientes',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'per_estado_civil',
            'attributes' => array(
                'id' => 'per_estado_civil',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Estado Civil:',
                'empty_option' => 'Escoja el estado civil',
                'value_options' => array(
                    1 => 'Arrendada',
                    2 => 'Vive con familiares',
                    3 => 'Propia No hipotecada',
                    4 => 'Propia Hipotecada',
                    5 => 'Prestada'
                ),
            ),
        ));
        $this->add(array(
            'name' => 'per_conyuge_nombre',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombre Conyuge',
            ),
        ));
        $this->add(array(
            'name' => 'per_conyuge_documento',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Documento',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'pro_id',
            'attributes' => array(
                'id' => 'pro_id',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Provincia:',
                'empty_option' => 'Escoja la provincia'
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'ciu_id',
            'attributes' => array(
                'id' => 'ciu_id',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Ciudad:',
                'empty_option' => 'Escoja la ciudad'
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'par_id',
            'attributes' => array(
                'id' => 'par_id',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Parroquia:',
                'empty_option' => 'Escoja la parroquia'
            ),
        ));


        $this->add(array(
            'name' => 'per_barrio',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Barrio',
            ),
        ));
        $this->add(array(
            'name' => 'per_direccion',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Direccion',
            ),
        ));
        $this->add(array(
            'name' => 'per_tiempo_residencia',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tiempo de residencia',
            ),
        ));
        $this->add(array(
            'name' => 'per_telefono',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Telefono',
            ),
        ));
        $this->add(array(
            'name' => 'per_celular',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Celular',
            ),
        ));
        $this->add(array(
            'name' => 'per_email',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'per_tipo_vivienda',
            'attributes' => array(
                'id' => 'per_tipo_vivienda',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tipo de Vivienda:',
                'empty_option' => 'Escoja el tipo de vivienda',
                'value_options' => array(
                    1 => 'Arrendada',
                    2 => 'Vive con familiares',
                    3 => 'Propia No hipotecada',
                    4 => 'Propia Hipotecada',
                    5 => 'Prestada'
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'act_economica',
            'attributes' => array(
                'id' => 'act_economica',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Actividad Económica:',
                'empty_option' => 'Escoja el tipo de actividad económica',
            ),
        ));


        $this->add(array(
            'name' => 'per_numero_empleados',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Numero de empleados',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'per_empresa_tipo',
            'attributes' => array(
                'id' => 'per_empresa_tipo',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tipo de Empresa:',
                'empty_option' => 'Escoja el tipo de empresa',
                'value_options' => array(
                    1 => 'Empresa Privada',
                    2 => 'Empresa Pública'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_producto',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Producto de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_inicio',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Inicio de operaciones de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_nombre',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombre de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_cargo',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cargo en la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_ruc',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Ruc de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_direccion',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Direccion de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_referencia',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Referencia de ubicacion de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_telefono',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Telefono de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_celular',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Celular de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_email',
            'attributes' => array(
                'type' => 'text', 'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email de la empresa',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'btn btn-success'
            ),
        ));
    }

}