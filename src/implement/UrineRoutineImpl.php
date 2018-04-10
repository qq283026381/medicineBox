<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 22:10
 */

require_once '../interface/IUrineRoutine.php';
require_once '../util/Mysql.php';

class UrineRoutineImpl implements IUrineRoutine
{
    private $mysql;
    private $conn;

    /**
     * UrineRoutineImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addUrineRoutine($urineRoutine)
    {
        $query = 'INSERT INTO urine_routine (user_id, LEU, KET, URO, BIL, SG, BLD, PRO, CLU, NIT, PH, urine_routine_sum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('issssdssssds',
            $urineRoutine->getUserId(),
            $urineRoutine->getLEU(),
            $urineRoutine->getKET(),
            $urineRoutine->getURO(),
            $urineRoutine->getBIL(),
            $urineRoutine->getSG(),
            $urineRoutine->getBLD(),
            $urineRoutine->getPRO(),
            $urineRoutine->getCLU(),
            $urineRoutine->getNIT(),
            $urineRoutine->getPH(),
            $urineRoutine->getUrineRoutineSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getUrineRoutine($urineRoutineId, $userId)
    {
        $query = 'SELECT * FROM urine_routine WHERE urine_routine_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $urineRoutineId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }
}