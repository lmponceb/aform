<?php
namespace Formulario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Formulario\Model\Formulario;
use Formulario\Model\Pais;
use Formulario\Model\Provincia;
use Formulario\Model\Ciudad;
use Formulario\Model\Parroquia;

use Formulario\Form\FormularioForm;
    
class FormularioController extends AbstractActionController
{
    protected $formularioTable;
    protected $paisTable;
    protected $provinciaTable;
    protected $ciudadTable;
    protected $parroquiaTable;
    protected $actividadEconomica;
    
    public function getFormularioTable()
    {
        if (!$this->formularioTable) {
            $sm = $this->getServiceLocator();
            $this->formularioTable = $sm->get('Formulario\Model\FormularioTable');
        }
        return $this->formularioTable;
    }
    
    public function getPaisTable()
    {
        if (!$this->paisTable) {
            $sm = $this->getServiceLocator();
            $this->paisTable = $sm->get('Formulario\Model\PaisTable');
        }
        return $this->paisTable;
    }
    
    public function getProvinciaTable()
    {
        if (!$this->provinciaTable) {
            $sm = $this->getServiceLocator();
            $this->provinciaTable = $sm->get('Formulario\Model\ProvinciaTable');
        }
        return $this->provinciaTable;
    }
    
    public function getCiudadTable()
    {
        if (!$this->ciudadTable) {
            $sm = $this->getServiceLocator();
            $this->ciudadTable = $sm->get('Formulario\Model\CiudadTable');
        }
        return $this->ciudadTable;
    }
    
    public function getParroquiaTable()
    {
        if (!$this->parroquiaTable) {
            $sm = $this->getServiceLocator();
            $this->parroquiaTable = $sm->get('Formulario\Model\ParroquiaTable');
        }
        return $this->parroquiaTable;
    }   
    
    public function getActividadEconomicaTable()
    {
        if (!$this->actividadEconomica) {
            $sm = $this->getServiceLocator();
            $this->actividadEconomica = $sm->get('Formulario\Model\ActividadEconomicaTable');
        }
        return $this->actividadEconomica;
    }  
    
    public function indexAction()
    {
        $form = new FormularioForm();
        $form->get('submit')->setValue('Guardar');

        $result= new ViewModel(array(
            'paises' => $this->getPaisTable()->getPaisesSelect(),
        ));
             
        $form->get('pai_id')->setValueOptions($result->paises);
               
        $result= new ViewModel(array(
            'provincias' => $this->getProvinciaTable()->getProvinciasSelect(),
        ));
        
        $form->get('pro_id')->setValueOptions($result->provincias);
        
        $result= new ViewModel(array(
            'ciudades' => $this->getCiudadTable()->getCiudadesSelect(),
        ));
        
        $form->get('ciu_id')->setValueOptions($result->ciudades);
        
        $result= new ViewModel(array(
            'parroquias' => $this->getParroquiaTable()->getParroquiasSelect(),
        ));
        
        $form->get('par_id')->setValueOptions($result->parroquias);
        
        $result= new ViewModel(array(
            'actividad_economica' => $this->getActividadEconomicaTable()->getActividadesSelect(),
        ));
        
        $form->get('act_economica')->setValueOptions($result->actividad_economica);
        
      /*$request = $this->getRequest();
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
        }*/
        return array('form' => $form);

    }
    
    //Función para cargar ciudades por provincia
    public function ciudadesAction(){
        if ($this->getRequest()->isXmlHttpRequest()) {
            $provincia = $this->request->getPost('provincia');
            $c = $this->getCiudadTable()->getCiudadesSelect($provincia);
            
            $jsonCities = json_encode($c);
            $response = $this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($jsonCities);

            return $response;
            
        }else{
            return $this->redirect()->toRoute('formulario', array('formulario' => 'index'));
        }
    }
    
    //Función para cargar ciudades por provincia
    public function parroquiasAction(){
        if ($this->getRequest()->isXmlHttpRequest()) {
            $ciudad = $this->request->getPost('ciudad');
            $c = $this->getParroquiaTable()->getParroquiasSelect($ciudad);
            
            $jsonCities = json_encode($c);
            $response = $this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($jsonCities);

            return $response;
            
        }else{
            return $this->redirect()->toRoute('formulario', array('formulario' => 'index'));
        }
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}