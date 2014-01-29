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

    public function indexAction() {
        $form = new FormularioForm();
        $form->get('submit')->setValue('Guardar');

        $form->get('pai_id')->setValueOptions($this->getPaisTable()->getPaisesSelect());
        $form->get('pro_id')->setValueOptions($this->getProvinciaTable()->getProvinciasSelect());
        $form->get('ciu_id')->setValueOptions($this->getCiudadTable()->getCiudadesSelect());
        $form->get('par_id')->setValueOptions($this->getParroquiaTable()->getParroquiasSelect());
        $form->get('act_eco_id')->setValueOptions($this->getActividadEconomicaTable()->getActividadesSelect());

        /* $request = $this->getRequest();
          if ($request->isPost()) {
          $album = new Formulario();
          $form->setInputFilter($album->getInputFilter());
          $form->setData($request->getPost());

          if ($form->isValid()) {
          $album->exchangeArray($form->getData());
          $this->getFormularioTable()->saveFormulario($formulario);

          // Redirect to list of albums
          return $this->redirect()->toRoute('album');
          }
          } */
        return array('form' => $form);
    }

    //Función para guardar los datos del formulario a la base de datos
    public function guardarAction() {
        $params = $this->request->getPost();

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

        //Guarda datos de información financiera de la persona
        $this->ingresosEgresos($params, $per_id);

//        echo '<pre>';
//        print_r();
//        echo '</pre>';
//        die();
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

    public function addAction() {
        
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}