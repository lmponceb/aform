<?php

namespace Formulario\Form;

use Zend\Form\Form;

class FormularioForm extends Form implements \Zend\InputFilter\InputFilterProviderInterface{

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
                'empty_option' => 'Escoja el País:'
            ),
        ));

        $this->add(array(
            'name' => 'per_documento',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'No. Cédula de Identidad o Pasaporte:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nombres',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_apellido_materno',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Apellido Materno:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_apellido_paterno',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Apellido Paterno:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nacimiento_lugar',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Lugar de Nacimiento:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_nacimiento_fecha',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'per_nacimiento_fecha',
            ),
            'options' => array(
                'label' => 'Fecha de Nacimiento:',
            ),
        ));


        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'per_sexo',
            'options' => array(
                'label' => 'Sexo:',
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
                'label' => 'No. de Dependientes:',
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
                    1 => 'Casado',
                    2 => 'Divorciado',
                    3 => 'Soltero',
                    4 => 'Unión Libre',
                    5 => 'Viudo'
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
                'label' => 'Nombre Cónyuge:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_conyuge_documento',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'No. Documento Cónyuge:',
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
                'label' => 'Barrio:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_direccion',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dirección:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_tiempo_residencia',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tiempo de Residencia:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_telefono',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Teléfono:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_celular',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Celular:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_email',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email:',
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
            'name' => 'act_eco_id',
            'attributes' => array(
                'id' => 'act_eco_id',
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
                'label' => 'Número de Empleados:',
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
                'label' => 'Producto/Servicio que ofrece la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_inicio',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
                'id' => 'per_empresa_inicio'
            ),
            'options' => array(
                'label' => 'Fecha de ingreso a la empresa o inicio de la misma:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_nombre',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombre de la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_cargo',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cargo en la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_ruc',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Ruc de la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_direccion',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dirección de la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_referencia',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Referencia de Ubicación de la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_telefono',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Teléfono de la Empresa:',
            ),
        ));
        $this->add(array(
            'name' => 'per_empresa_celular',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Celular de la Empresa:',
            ),
        ));
        
        $this->add(array(
            'name' => 'per_empresa_email',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email de la Empresa:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_arriendos1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Arriendos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_remesas2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Remesas:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_sueldo_solicitante3',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Sueldo Solicitante:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_sueldo_conyuge4',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Sueldo Conyuge:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_pensiones5',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Pensiones:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_ingresos_negocio6',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Ingresos Negocios:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_alimentacion7',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Alimentación:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_educacion8',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Educación:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_servicios_basicos9',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Luz, Agua, Teléfono:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_arriendo_gasto10',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Arriendo:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_otros11',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Otros Gastos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_deudas12',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cuota Mensual Deudas:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_combustible13',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Combustible:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_transporte14',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Transporte:',
            ),
        ));
        
        $this->add(array(
            'name' => 'inf_fin_vestuario15',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Vestuario:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_bancos1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Caja y Bancos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_inversiones2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Inversiones:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_cuentas3',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cuentas y Doc. Por Cobrar:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_mercaderia4',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Mercadería:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_muebles5',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Muebles y Enseres:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_vehiculos6',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Vehículos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_propiedades7',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Propiedades:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_activos8',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Otros Activos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_prestamos9',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Préstamos en Inst. Financieras:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_cuentas_pagar10',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Cuentas y Doc. Por Pagar:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_otras_obligaciones11',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Otras Obligaciones:',
            ),
        ));
        
        $this->add(array(
            'name' => 'sit_fin_prestamo12',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Préstamo en Alianza del Valle:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_nombres1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres y Apellidos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_nombres2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres y Apellidos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_direccion1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dirección:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_direccion2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dirección:',
            ),
        ));
                
        $this->add(array(
            'name' => 'ref_per_telefono1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Teléfono:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_per_telefono2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Teléfono:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_nombres1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres y Apellidos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_nombres2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nombres y Apellidos:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_direccion1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dirección:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_direccion2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Dirección:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_telefono1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Teléfono:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_com_telefono2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Teléfono:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_banco1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Institución:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_banco2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Institución:',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'ref_ban_tipo_cuenta1',
            'attributes' => array(
                'id' => 'ref_ban_tipo_cuenta1',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tipo de Cuenta:',
                'empty_option' => 'Escoja el tipo de cuenta',
                'value_options' => array(
                    'C' => 'Cuenta Corriente',
                    'A' => 'Cuenta Ahorros'
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'ref_ban_tipo_cuenta2',
            'attributes' => array(
                'id' => 'ref_ban_tipo_cuenta2',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tipo de Cuenta:',
                'empty_option' => 'Escoja el tipo de cuenta',
                'value_options' => array(
                    'C' => 'Cuenta Corriente',
                    'A' => 'Cuenta Ahorros'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_numero_cuenta1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Número de Cuenta:',
            ),
        ));
        
        $this->add(array(
            'name' => 'ref_ban_numero_cuenta2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Número de Cuenta:',
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_institucion1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Institución:',
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_institucion2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Institución:',
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_numero_tarjeta1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Número de Tarjeta:',
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_numero_tarjeta2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Número de Tarjeta:',
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_anio_socio1',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control tar_cre_anio_socio',
            ),
            'options' => array(
                'label' => 'Socio desde(Año):',
            ),
        ));
        
        $this->add(array(
            'name' => 'tar_cre_anio_socio2',
            'attributes' => array(
                'type' => 'text', 
                'class' => 'form-control tar_cre_anio_socio',
            ),
            'options' => array(
                'label' => 'Socio desde(Año):',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'per_tarjeta_credito',
            'attributes' => array(
                'id' => 'per_tarjeta_credito',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tarjeta de Cajero Automático:',
                'empty_option' => 'Escoja una opción',
                'value_options' => array(
                    'SI' => 'SI',
                    'NO' => 'NO'
                ),
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
    
    public function getInputFilterSpecification()
    {
        return array(
            array(
                'name' => 'per_documento',
                'required' => true,
                'validators' => array(
                    array('name' => '\Formulario\Form\CedulaValidator'),
                ),
            ),
        );
    }

}