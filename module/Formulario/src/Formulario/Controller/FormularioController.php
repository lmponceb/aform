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
    
    public function indexAction()
    {
        $form = new FormularioForm();
        $form->get('submit')->setValue('Add');

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