<?php

namespace Formulario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Formulario\Model\Persona;
use Formulario\Model\Pais;
use Formulario\Model\Provincia;
use Formulario\Model\Ciudad;
use Formulario\Model\Parroquia;
use Formulario\Model\ActividadEconomicaPorPersona as ActividadPorPersona;
use Formulario\Model\ActividadEconomica;
use Formulario\Model\ReferenciasPersonales;
use Formulario\Form\FormularioForm;

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
            $this->actividadEconomica = $sm->get('Formulario\Model\ActividadPorPersonaTable');
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

    //Función para generar el formulario    
    public function indexAction() {
        $form = new FormularioForm();
        $form->get('submit')->setValue('Guardar');

        $form->get('pai_id')->setValueOptions($this->getPaisTable()->getPaisesSelect());
        $form->get('pro_id')->setValueOptions($this->getProvinciaTable()->getProvinciasSelect());
        $form->get('ciu_id')->setValueOptions($this->getCiudadTable()->getCiudadesSelect());
        $form->get('par_id')->setValueOptions($this->getParroquiaTable()->getParroquiasSelect());
        $form->get('act_eco_id')->setValueOptions($this->getActividadEconomicaTable()->getActividadesSelect());

        return array('form' => $form);
    }

    //Función para guardar los datos del formulario a la base de datos
    public function guardarAction() {
        $params = $this->request->getPost();

        $rp = new ReferenciasPersonales();
        $p = $this->referenciasPersonales($params);
//        $rp->exchangeArray($p);
        echo '<pre>';
        print_r($p);
        echo '</pre>';
        die();

        //Guardar datos de la persona
        $persona = new Persona();
        $persona->exchangeArray($params);
        $this->getPersonaTable()->guardar($persona);

        //Obtener la id de una persona
        $per_id = $this->getPersonaTable()->obtenerPorCedula($persona->getPer_documento());

        //Guardar datos de actividad economica de la persona
        $actividadPorPersona = new ActividadPorPersona;
        $actividadPorPersona->exchangeArray($params);
        $actividadPorPersona->setPer_id($per_id);
        $this->getActividadEconomicaTable->guardar($actividadPorPersona);

        //Guarda datos de información financiera de la persona
        $this->ingresosEgresos($params, $per_id);

        //Guarda datos de situación financiera de la persona
        $this->activosPasivos($params, $per_id);

        echo '<pre>';
        print_r();
        echo '</pre>';
        die();

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

    public function referenciasPersonales($params) {
        $arreglo = array();

        foreach ($params as $key => $value) {
            if (substr($key, 0, 7) == 'ref_per') {
                $arreglo[substr($key, 0, strlen($key) - 1)] = $value;
                $this->getReferenciasPersonales()->guardar($per_id);
            }
        }

        return $arreglo;
    }

    public function addAction() {
        
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}