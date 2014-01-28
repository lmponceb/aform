<?php
namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class CiudadTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getCit($ciu_id)
    {
        $ciu_id  = (int) $ciu_id;
        $rowset = $this->tableGateway->select(array('ciu_id' => $ciu_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $ciu_id");
        }
        return $row;
    }
    public function getCiudadesSelect() {
        $resultSet = $this->tableGateway->select();
        $result = array();
        foreach ($resultSet as $ciudad){
            $result[$ciudad->ciu_id]=$ciudad->ciu_nombre;
        }
        return $result;
    }

}