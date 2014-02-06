<?php

namespace Formulario\Form;

use Zend\InputFilter\InputFilter;

class FormularioValidator extends InputFilter{
    
    function __construct($name = null) {
        
        $this->add(array(
            'name' => 'per_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int')
            ),
        ));

        $this->add(array(
            'name' => 'pai_id',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'tipo_documento',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_documento',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alnum',
                    'options' => array(
                        'messages' => array(
                            \Zend\I18n\Validator\Alnum::NOT_ALNUM=> 'El campo debe tener solo números o letras',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nombres',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_apellido_materno',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',                            
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_apellido_paterno',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nacimiento_lugar',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nacimiento_fecha',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date',
                    'options' => array(
                        'format' => 'Y/m/d',
                        'messages' => array(
                        \Zend\Validator\Date::INVALID => 'Formato de fecha incorrecto',
                        
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_sexo',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_dependientes',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_estado_civil',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_conyuge_nombre',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_conyuge_documento',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'pro_id',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ciu_id',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'par_id',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_barrio',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_direccion',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_tiempo_residencia',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_telefono',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_celular',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_email',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',                        
                        ),
                    ),
                ),
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                        \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Email no válido',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_tipo_vivienda',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'act_eco_id',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_numero_empleados',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_tipo',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_producto',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_inicio',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date',
                    'options' => array(
                        'format' => 'Y/m/d',
                        'messages' => array(
                        \Zend\Validator\Date::INVALID => 'Formato de fecha incorrecto',
                        \Zend\Validator\Date::INVALID_DATE   => "Fecha no es válida",                 
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_nombre',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_cargo',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_ruc',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_direccion',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_referencia',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_telefono',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_celular',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_email',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                        \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Email no válido',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_arriendos1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_remesas2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_sueldo_solicitante3',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_sueldo_conyuge4',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_pensiones5',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_ingresos_negocio6',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_alimentacion7',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_educacion8',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_servicios_basicos9',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_arriendo_gasto10',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_otros11',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_deudas12',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_combustible13',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_transporte14',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_vestuario15',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_bancos1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_inversiones2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_cuentas3',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_mercaderia4',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_muebles5',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_vehiculos6',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_propiedades7',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_activos8',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_prestamos9',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_cuentas_pagar10',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_otras_obligaciones11',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_prestamo12',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Float',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Float::NOT_FLOAT => 'El campo debe tener solo números decimales',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_nombres1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::INVALID => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_nombres2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::INVALID => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_direccion1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_direccion2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_telefono1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_telefono2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_nombres1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_nombres2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_direccion1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_direccion2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_telefono1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_telefono2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_banco1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_banco2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_tipo_cuenta1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_tipo_cuenta2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_numero_cuenta1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_numero_cuenta2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_institucion1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_institucion2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Alpha::NOT_ALPHA => 'El campo debe tener solo letras',
                        \Zend\I18n\Validator\Alpha::STRING_EMPTY => 'El campo es obligatorio',
                        ),
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_numero_tarjeta1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_numero_tarjeta2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Int',
                    'options' => array(
                        'messages' => array(
                        \Zend\I18n\Validator\Int::NOT_INT => 'El campo debe tener solo números',
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_anio_socio1',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date',
                    'options' => array(
                        'format' => 'Y',
                        'messages' => array(
                        \Zend\Validator\Date::INVALID => 'Formato de fecha incorrecto',
                        \Zend\Validator\Date::INVALID_DATE   => "Solo se acepta el año. Ej: 1990",                 
                        ),
                    ),
                ),
            ),
        ));    
        
        $this->add(array(
            'name' => 'tar_cre_anio_socio2',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date',
                    'options' => array(
                        'format' => 'Y',
                        'messages' => array(
                        \Zend\Validator\Date::INVALID => 'Formato de fecha incorrecto',
                        \Zend\Validator\Date::INVALID_DATE   => "Solo se acepta el año. Ej: 1990",                 
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'per_tarjeta_credito',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'El campo es obligatorio',
                        ),
                    ),
                ),
            ),
        ));
        
    }
}
