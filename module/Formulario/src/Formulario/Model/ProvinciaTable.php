<?php
namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class ProvinciaTable
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

    public function getPro($pro_id)
    {
        $pro_id  = (int) $pro_id;
        $rowset = $this->tableGateway->select(array('pro_id' => $pro_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $pro_id");
        }
        return $row;
    }
    public function getProvinciasSelect() {
        $resultSet = $this->tableGateway->select();
        $result = array();
        foreach ($resultSet as $provincia){
            $result[$provincia->pro_id]=$provincia->pro_nombre;
        }
        return $result;
    }

}