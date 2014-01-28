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
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Documento',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nombres',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_apellido_materno',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Apellido materno',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_apellido_paterno',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
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
                'type' => 'text', 
                'class' => 'form-control',
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
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombre Conyuge',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_conyuge_documento',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
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
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Barrio',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_direccion',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Direccion',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_tiempo_residencia',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tiempo de residencia',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_telefono',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Telefono',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_celular',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
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
                'type' => 'text', 
                'class' => 'form-control',
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
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Producto de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_inicio',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Inicio de operaciones de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_nombre',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombre de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_cargo',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cargo en la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_ruc',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
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
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Referencia de ubicacion de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_telefono',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Telefono de la empresa',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_celular',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Celular de la empresa',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_email',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email de la empresa',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_arriendos',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Arriendos',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_remesas',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Remesas',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_sueldo_solicitante',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Sueldo Solicitante',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_sueldo_conyuge',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Sueldo Conyuge',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_pensiones',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Pensiones',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_ingresos_negocio',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Ingresos Negocios',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_alimentacion',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Alimentación',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_educacion',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Educación',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_servicios_basicos',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Luz, Agua, Teléfono',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_arriendo_gasto',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Arriendo',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_otros',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Otros Gastos',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_deudas',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cuota Mensual Deudas',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_combustible',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Combustible',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_transporte',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Transporte',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_vestuario',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Vestuario',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_bancos',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Caja y Bancos',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_inversiones',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Inversiones',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_cuentas',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cuentas y Doc. Por Cobrar',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_mercaderia',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Mercadería',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_muebles',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Muebles y Enseres',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_vehiculos',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Vehículos',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_propiedades',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Propiedades',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_activos',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Otros Activos',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_prestamos',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Prestamos en Inst. Financieras',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_cuentas_pagar',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cuentas y Doc. Por Pagar',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_otras_obligaciones',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Otras Obligaciones',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_prestamo',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Prestamo en Alianza del Valle',
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