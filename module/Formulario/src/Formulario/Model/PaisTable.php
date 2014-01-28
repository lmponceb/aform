<?php
namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class PaisTable
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

    public function getPai($pai_id)
    {
        $pai_id  = (int) $pai_id;
        $rowset = $this->tableGateway->select(array('pai_id' => $pai_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $pai_id");
        }
        return $row;
    }
    public function getPaisesSelect() {
        $resultSet = $this->tableGateway->select();
        $result = array();
        foreach ($resultSet as $pais){
            $result[$pais->pai_id]=$pais->pai_nombre;
        }
        return $result;
    }

}