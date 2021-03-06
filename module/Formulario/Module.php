<?php

namespace Formulario;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Formulario\Model\Persona;
use Formulario\Model\PersonaTable;
use Formulario\Model\Pais;
use Formulario\Model\PaisTable;
use Formulario\Model\Provincia;
use Formulario\Model\ProvinciaTable;
use Formulario\Model\Ciudad;
use Formulario\Model\CiudadTable;
use Formulario\Model\Parroquia;
use Formulario\Model\ParroquiaTable;
use Formulario\Model\ActividadEconomica;
use Formulario\Model\ActividadEconomicaTable;
use Formulario\Model\ActividadEconomicaPorPersona as ActividadPorPersona;
use Formulario\Model\ActividadEconomicaPorPersonaTable as ActividadPorPersonaTable;
use Formulario\Model\InformacionFinanciera;
use Formulario\Model\InformacionFinancieraTable;
use Formulario\Model\InformacionFinancieraPorPersona as FinancieraPorPersona;
use Formulario\Model\InformacionFinancieraPorPersonaTable as FinancieraPorPersonaTable;
use Formulario\Model\SituacionFinancieraPorPersona as SituacionPorPersona;
use Formulario\Model\SituacionFinancieraPorPersonaTable as SituacionPorPersonaTable;
use Formulario\Model\ReferenciasPersonales;
use Formulario\Model\ReferenciasPersonalesTable;
use Formulario\Model\ReferenciasComerciales;
use Formulario\Model\ReferenciasComercialesTable;
use Formulario\Model\ReferenciasBancarias;
use Formulario\Model\ReferenciasBancariasTable;
use Formulario\Model\TarjetasCredito;
use Formulario\Model\TarjetasCreditoTable;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Formulario\Model\PersonaTable' => function($sm) {
                    $tableGateway = $sm->get('PersonaTableGateway');
                    $table = new PersonaTable($tableGateway);
                    return $table;
                },
                'PersonaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Persona());
                    return new TableGateway('persona', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\PaisTable' => function($sm) {
                    $tableGateway = $sm->get('PaisTableGateway');
                    $table = new PaisTable($tableGateway);
                    return $table;
                },
                'PaisTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Pais());
                    return new TableGateway('pais', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ProvinciaTable' => function($sm) {
                    $tableGateway = $sm->get('ProvinciaTableGateway');
                    $table = new ProvinciaTable($tableGateway);
                    return $table;
                },
                'ProvinciaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Provincia());
                    return new TableGateway('provincia', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\CiudadTable' => function($sm) {
                    $tableGateway = $sm->get('CiudadTableGateway');
                    $table = new CiudadTable($tableGateway);
                    return $table;
                },
                'CiudadTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Ciudad());
                    return new TableGateway('ciudad', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ParroquiaTable' => function($sm) {
                    $tableGateway = $sm->get('ParroquiaTableGateway');
                    $table = new ParroquiaTable($tableGateway);
                    return $table;
                },
                'ParroquiaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Parroquia());
                    return new TableGateway('parroquia', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ActividadEconomicaTable' => function($sm) {
                    $tableGateway = $sm->get('ActividadEconomicaTableGateway');
                    $table = new ActividadEconomicaTable($tableGateway);
                    return $table;
                },
                'ActividadEconomicaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ActividadEconomica());
                    return new TableGateway('actividad_economica', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ActividadPorPersonaTable' => function($sm) {
                    $tableGateway = $sm->get('ActividadPorPersonaTableGateway');
                    $table = new ActividadPorPersonaTable($tableGateway);
                    return $table;
                },
                'ActividadPorPersonaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ActividadPorPersona());
                    return new TableGateway('actividad_economica_por_persona', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\InformacionFinancieraTable' => function($sm) {
                    $tableGateway = $sm->get('InformacionFinancieraTableGateway');
                    $table = new InformacionFinancieraTable($tableGateway);
                    return $table;
                },
                'InformacionFinancieraTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new InformacionFinanciera());
                    return new TableGateway('informacion_financiera', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\FinancieraPorPersonaTable' => function($sm) {
                    $tableGateway = $sm->get('FinancieraPorPersonaTableGateway');
                    $table = new FinancieraPorPersonaTable($tableGateway);
                    return $table;
                },
                'FinancieraPorPersonaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new FinancieraPorPersona());
                    return new TableGateway('informacion_financiera_por_persona', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\SituacionPorPersonaTable' => function($sm) {
                    $tableGateway = $sm->get('SituacionPorPersonaTableGateway');
                    $table = new SituacionPorPersonaTable($tableGateway);
                    return $table;
                },
                'SituacionPorPersonaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new SituacionPorPersona());
                    return new TableGateway('situacion_financiera_por_persona', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ReferenciasPersonalesTable' => function($sm) {
                    $tableGateway = $sm->get('ReferenciasPersonalesTableGateway');
                    $table = new ReferenciasPersonalesTable($tableGateway);
                    return $table;
                },
                'ReferenciasPersonalesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ReferenciasPersonales());
                    return new TableGateway('referencias_personales', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ReferenciasComercialesTable' => function($sm) {
                    $tableGateway = $sm->get('ReferenciasComercialesTableGateway');
                    $table = new ReferenciasComercialesTable($tableGateway);
                    return $table;
                },
                'ReferenciasComercialesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ReferenciasComerciales());
                    return new TableGateway('referencias_comerciales', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\ReferenciasBancariasTable' => function($sm) {
                    $tableGateway = $sm->get('ReferenciasBancariasTableGateway');
                    $table = new ReferenciasBancariasTable($tableGateway);
                    return $table;
                },
                'ReferenciasBancariasTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ReferenciasBancarias());
                    return new TableGateway('referencias_bancarias', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulario\Model\TarjetasCreditoTable' => function($sm) {
                    $tableGateway = $sm->get('TarjetasCreditoTableGateway');
                    $table = new TarjetasCreditoTable($tableGateway);
                    return $table;
                },
                'TarjetasCreditoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new TarjetasCredito());
                    return new TableGateway('tarjetas_credito', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}
