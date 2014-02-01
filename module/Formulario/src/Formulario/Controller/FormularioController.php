<?php

namespace Formulario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Formulario\Model\Persona;
use Formulario\Model\ActividadEconomicaPorPersona;
use Formulario\Model\ReferenciasPersonales;
use Formulario\Model\ReferenciasComerciales;
use Formulario\Model\ReferenciasBancarias;
use Formulario\Model\TarjetasCredito;
use Formulario\Form\FormularioForm;
use Formulario\Form\FormularioValidator;

class FormularioController extends AbstractActionController {

    protected $personaTable;
    protected $paisTable;
    protected $provinciaTable;
    protected $ciudadTable;
    protected $parroquiaTable;
    protected $actividadEconomica;
    protected $actividadPorPersona;
    protected $informacionFinanciera;
    protected $financieraPorPersona;
    protected $situacionPorPersona;
    protected $referenciasPersonales;
    protected $referenciasComerciales;
    protected $referenciasBancarias;
    protected $tarjetasCredito;

    public function getPersonaTable() {
        if (!$this->personaTable) {
            $sm = $this->getServiceLocator();
            $this->personaTable = $sm->get('Formulario\Model\PersonaTable');
        }
        return $this->personaTable;
    }

    public function getPaisTable() {
        if (!$this->paisTable) {
            $sm = $this->getServiceLocator();
            $this->paisTable = $sm->get('Formulario\Model\PaisTable');
        }
        return $this->paisTable;
    }

    public function getProvinciaTable() {
        if (!$this->provinciaTable) {
            $sm = $this->getServiceLocator();
            $this->provinciaTable = $sm->get('Formulario\Model\ProvinciaTable');
        }
        return $this->provinciaTable;
    }

    public function getCiudadTable() {
        if (!$this->ciudadTable) {
            $sm = $this->getServiceLocator();
            $this->ciudadTable = $sm->get('Formulario\Model\CiudadTable');
        }
        return $this->ciudadTable;
    }

    public function getParroquiaTable() {
        if (!$this->parroquiaTable) {
            $sm = $this->getServiceLocator();
            $this->parroquiaTable = $sm->get('Formulario\Model\ParroquiaTable');
        }
        return $this->parroquiaTable;
    }

    public function getActividadEconomicaTable() {
        if (!$this->actividadEconomica) {
            $sm = $this->getServiceLocator();
            $this->actividadEconomica = $sm->get('Formulario\Model\ActividadEconomicaTable');
        }
        return $this->actividadEconomica;
    }

    public function getActividadPorPersonaTable() {
        if (!$this->actividadPorPersona) {
            $sm = $this->getServiceLocator();
            $this->actividadPorPersona = $sm->get('Formulario\Model\ActividadPorPersonaTable');
        }
        return $this->actividadPorPersona;
    }

    public function getInformacionFinanciera() {

        if (!$this->informacionFinanciera) {
            $sm = $this->getServiceLocator();
            $this->informacionFinanciera = $sm->get('Formulario\Model\InformacionFinancieraTable');
        }
        return $this->informacionFinanciera;
    }

    public function getFinancieraPorPersona() {

        if (!$this->financieraPorPersona) {
            $sm = $this->getServiceLocator();
            $this->financieraPorPersona = $sm->get('Formulario\Model\FinancieraPorPersonaTable');
        }
        return $this->financieraPorPersona;
    }

    public function getSituacionPorPersona() {
        if (!$this->situacionPorPersona) {
            $sm = $this->getServiceLocator();
            $this->situacionPorPersona = $sm->get('Formulario\Model\SituacionPorPersonaTable');
        }
        return $this->situacionPorPersona;
    }

    public function getReferenciasPersonales() {
        if (!$this->referenciasPersonales) {
            $sm = $this->getServiceLocator();
            $this->referenciasPersonales = $sm->get('Formulario\Model\ReferenciasPersonalesTable');
        }
        return $this->referenciasPersonales;
    }
    
    public function getReferenciasComerciales() {
        if (!$this->referenciasComerciales) {
            $sm = $this->getServiceLocator();
            $this->referenciasComerciales = $sm->get('Formulario\Model\ReferenciasComercialesTable');
        }
        return $this->referenciasComerciales;
    }

    public function getReferenciasBancarias() {
        if (!$this->referenciasBancarias) {
            $sm = $this->getServiceLocator();
            $this->referenciasBancarias = $sm->get('Formulario\Model\ReferenciasBancariasTable');
        }
        return $this->referenciasBancarias;
    }
    
    public function getTarjetasCredito() {
        if (!$this->tarjetasCredito) {
            $sm = $this->getServiceLocator();
            $this->tarjetasCredito = $sm->get('Formulario\Model\TarjetasCreditoTable');
        }
        return $this->tarjetasCredito;
    }

        
    //Función para generar el formulario    
    public function indexAction() {
        $form = new FormularioForm();
        $form->get('submit')->setValue('Guardar');

        $form->get('pai_id')->setValueOptions($this->getPaisTable()->getPaisesSelect());
        $form->get('pro_id')->setValueOptions($this->getProvinciaTable()->getProvinciasSelect());
        $form->get('ciu_id')->setValueOptions($this->getCiudadTable()->getCiudadesSelect());
        $form->get('par_id')->setValueOptions($this->getParroquiaTable()->getParroquiasSelect());
        $form->get('act_eco_id')->setValueOptions($this->getActividadEconomicaTable()->getActividadesSelect());

        return new ViewModel(array(
            'form' => $form,
            'flag' => 'crear'
                ));
    }

    //Función para guardar los datos del formulario a la base de datos
    public function guardarAction() {
        if(!$this->getRequest()->isPost()){
            return $this->redirect()->toRoute('formulario',array('controller' => 'formulario'));
        }
        
        $params = $this->request->getPost();
            
        $form = new FormularioForm();
        $form->get('pai_id')->setValueOptions($this->getPaisTable()->getPaisesSelect());
        $form->get('pro_id')->setValueOptions($this->getProvinciaTable()->getProvinciasSelect());
        $form->get('ciu_id')->setValueOptions($this->getCiudadTable()->getCiudadesSelect());
        $form->get('par_id')->setValueOptions($this->getParroquiaTable()->getParroquiasSelect());
        $form->get('act_eco_id')->setValueOptions($this->getActividadEconomicaTable()->getActividadesSelect());
               
        $form->setInputFilter(new FormularioValidator());
        
        if(!$params['per_conyuge_nombre'] == ''){
            $form->getInputFilter()->get('per_conyuge_documento')->setRequired(true);
        }
        
        $form->setData($params);
        
        if(!$form->isValid()){
            $form->get('ciu_id')->setValueOptions($this->getCiudadTable()->getCiudadesSelect($form->getValue('pro_id')));
            $mv = new ViewModel(array(
                'form' => $form,
                'flag' => 'editar'
            ));
            
            $mv->setTemplate('formulario/formulario/index');
            return $mv;
        }
        
        
        
        $persona = new Persona();
        $persona->exchangeArray($params);
            $mv = new ViewModel(array(
                'form' => $form,
                'flag' => 'editar'
            ));
        if(!$this->getPersonaTable()->obtenerPorCedula($persona->getPer_documento())){
            //Guardar datos de la persona    
            $this->getPersonaTable()->guardar($persona);  
        }else{
            $mv = new ViewModel(array(
                'form' => $form,
                'flag' => 'editar',
                'message' => 'Usuario Ya Existe'
            ));
            
            $mv->setTemplate('formulario/formulario/index');
            return $mv;
        }
        
        //Obtener la id de una persona
        $per_id = $this->getPersonaTable()->obtenerPorCedula($persona->getPer_documento());
        //Guardar datos de actividad economica de la persona
        $actividadPorPersona = new ActividadEconomicaPorPersona();
        $actividadPorPersona->exchangeArray($params);
        $actividadPorPersona->setPer_id($per_id);
        $this->getActividadPorPersonaTable()->guardar($actividadPorPersona);

        //Guarda datos de información financiera de la persona
        $this->ingresosEgresos($params, $per_id);
        //Guarda datos de situación financiera de la persona
        $this->activosPasivos($params, $per_id);
        //Guarda datos de referencias 
        $this->referencias($per_id,$params);


        return $this->redirect()->toRoute('formulario');
    }

    //Función para cargar ciudades por provincia
    public function ciudadesAction() {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $provincia = $this->request->getPost('provincia');
            $c = $this->getCiudadTable()->getCiudadesSelect($provincia);

            $jsonCities = json_encode($c);
            $response = $this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($jsonCities);

            return $response;
        } else {
            return $this->redirect()->toRoute('formulario', array('formulario' => 'index'));
        }
    }

    //Función para cargar ciudades por provincia
    public function parroquiasAction() {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $ciudad = $this->request->getPost('ciudad');
            $c = $this->getParroquiaTable()->getParroquiasSelect($ciudad);

            $jsonCities = json_encode($c);
            $response = $this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($jsonCities);

            return $response;
        } else {
            return $this->redirect()->toRoute('formulario', array('formulario' => 'index'));
        }
    }

    //Función para ingresar información financiera por persona
    public function ingresosEgresos($params, $per_id) {

        $ingresos = array(
            'inf_fin_arriendos1' => 1,
            'inf_fin_remesas2' => 2,
            'inf_fin_sueldo_solicitante3' => 3,
            'inf_fin_sueldo_conyuge4' => 4,
            'inf_fin_pensiones5' => 5,
            'inf_fin_ingresos_negocio6' => 6,
        );

//            $result = array();
        foreach ($ingresos as $key => $value) {
            if ((int) $params[$key] > 0) {
                $this->getFinancieraPorPersona()->guardar($per_id, $value, $params[$key]);
//                    $result[$value] = $params[$key];
            }
        }
//            return $result;

        $egresos = array(
            'inf_fin_alimentacion7' => 7,
            'inf_fin_educacion8' => 8,
            'inf_fin_servicios_basicos9' => 9,
            'inf_fin_arriendo_gasto10' => 10,
            'inf_fin_otros11' => 11,
            'inf_fin_deudas12' => 12,
            'inf_fin_combustible13' => 13,
            'inf_fin_transporte14' => 14,
            'inf_fin_vestuario15' => 15,
        );

//            $result = array();
        foreach ($egresos as $key => $value) {
            if ((int) $params[$key] > 0) {
                $this->getFinancieraPorPersona()->guardar($per_id, $value, '-' . $params[$key]);
//                    $result[$value] = '-'.$params[$key];
            }
        }
//            return $result;
    }

    //Función para ingresar situación financiera por persona
    public function activosPasivos($params, $per_id = null) {

        $activos = array(
            'sit_fin_bancos1' => 1,
            'sit_fin_inversiones2' => 2,
            'sit_fin_cuentas3' => 3,
            'sit_fin_mercaderia4' => 4,
            'sit_fin_muebles5' => 5,
            'sit_fin_vehiculos6' => 6,
            'sit_fin_propiedades7' => 7,
            'sit_fin_activos8' => 8
        );

//        $result = array();
        foreach ($activos as $key => $value) {
            if ((int) $params[$key] > 0) {
                $this->getSituacionPorPersona()->guardar($per_id, $value, $params[$key]);
//                $result[$value] = $params[$key];
            }
        }


        $pasivos = array(
            'sit_fin_prestamos9' => 9,
            'sit_fin_cuentas_pagar10' => 10,
            'sit_fin_otras_obligaciones11' => 11,
            'sit_fin_prestamo12' => 12
        );

        foreach ($pasivos as $key => $value) {
            if ((int) $params[$key] > 0) {
                $this->getSituacionPorPersona()->guardar($per_id, $value, '-' . $params[$key]);
//                $result[$value] = $params[$key];
            }
        }

//        return $result;
    }
    
    //Guarda las referencias
    public function referencias($per_id,$params){
        $personales1 = array();
        $personales2 = array();
        $comerciales1 = array();
        $comerciales2 = array();
        $bancarias1 = array();
        $bancarias2 = array();
        $tarjetas1 = array();
        $tarjetas2 = array();
        $i = 0;
        $j = 0;
        $l = 0;
        $m = 0;
        foreach($params as $key => $value){
            $c = substr($key, 0,7);
            if($c == 'ref_per'){
                if($i < 3){
                    $k = substr($key, 0,  strlen($key)-1);
                    $personales1[$k] = $value;
                    $i++;
                }else{
                    $k = substr($key, 0,  strlen($key)-1);
                    $personales2[$k] = $value;
                }
            }
            if($c == 'ref_com'){
                if($j < 3){
                    $k = substr($key, 0,  strlen($key)-1);
                    $comerciales1[$k] = $value;
                    $j++;
                }else{
                    $k = substr($key, 0,  strlen($key)-1);
                    $comerciales2[$k] = $value;
                }
            }
            if($c == 'ref_ban'){
                if($l < 3){
                    $k = substr($key, 0,  strlen($key)-1);
                    $bancarias1[$k] = $value;
                    $l++;
                }else{
                    $k = substr($key, 0,  strlen($key)-1);
                    $bancarias2[$k] = $value;
                }
            }
            if($c == 'tar_cre'){
                if($m < 3){
                    $k = substr($key, 0,  strlen($key)-1);
                    $tarjetas1[$k] = $value;
                    $m++;
                }else{
                    $k = substr($key, 0,  strlen($key)-1);
                    $tarjetas2[$k] = $value;
                }
            }

        }
        
        $p1 = new ReferenciasPersonales();
        $p1->exchangeArray($personales1);
        $p1->setPer_id($per_id);
        
        $p2 = new ReferenciasPersonales();
        $p2->exchangeArray($personales2);
        $p2->setPer_id($per_id);
        
        $this->getReferenciasPersonales()->guardar($p1);
        $this->getReferenciasPersonales()->guardar($p2);
        
        $c1 = new ReferenciasComerciales();
        $c1->exchangeArray($comerciales1);
        $c1->setPer_id($per_id);
        
        $c2 = new ReferenciasComerciales();
        $c2->exchangeArray($comerciales2);
        $c2->setPer_id($per_id);
        
        $this->getReferenciasComerciales()->guardar($c1);
        $this->getReferenciasComerciales()->guardar($c2);
        
        $b1 = new ReferenciasBancarias();
        $b1->exchangeArray($bancarias1);
        $b1->setPer_id($per_id);
        
        $b2 = new ReferenciasBancarias();
        $b2->exchangeArray($bancarias2);
        $b2->setPer_id($per_id);
        
        $this->getReferenciasBancarias()->guardar($b1);
        $this->getReferenciasBancarias()->guardar($b2);
        
        $t1 = new TarjetasCredito();
        $t1->exchangeArray($tarjetas1);
        $t1->setPer_id($per_id);
        
        $t2 = new TarjetasCredito();
        $t2->exchangeArray($tarjetas2);
        $t2->setPer_id($per_id);
        
        $this->getTarjetasCredito()->guardar($t1);
        $this->getTarjetasCredito()->guardar($t2);
        
        return $p1;
    }

    public function addAction() {
        
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}