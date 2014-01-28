<?php
namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class ParroquiaTable
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

    public function getPar($par_id)
    {
        $par_id  = (int) $par_id;
        $rowset = $this->tableGateway->select(array('par_id' => $par_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $par_id");
        }
        return $row;
    }
    public function getParroquiasSelect() {
        $resultSet = $this->tableGateway->select();
        $result = array();
        foreach ($resultSet as $parroquia){
            $result[$parroquia->par_id]=$parroquia->par_nombre;
        }
        return $result;
    }

}