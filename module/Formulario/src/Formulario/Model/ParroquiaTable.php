<?php

namespace Formulario\Model;

use Zend\Db\TableGateway\TableGateway;

class ParroquiaTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getPar($par_id) {
        $par_id = (int) $par_id;
        $rowset = $this->tableGateway->select(array('par_id' => $par_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $par_id");
        }
        return $row;
    }

    public function getParroquiasSelect($ciu_id = null) {
        if ($ciu_id == null) {
            $resultSet = $this->tableGateway->select();
        } else {
            $resultSet = $this->tableGateway->select(array('ciu_id' => $ciu_id));
        }
        $result = array();
        foreach ($resultSet as $parroquia) {
            $result[$parroquia->par_id] = $parroquia->par_nombre;
        }
        return $result;
    }

}