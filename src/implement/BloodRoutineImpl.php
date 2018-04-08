<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 21:40
 */

require_once '../interface/IBloodRoutine.php';
require_once '../util/Mysql.php';

class BloodRoutineImpl implements IBloodRoutine
{
    private $mysql;
    private $conn;

    /**
     * BloodRoutineImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addBloodRoutine($bloodRoutine)
    {
        $query = 'INSERT INTO blood_routine (user_id, WBC, PBC, HGB, HCT, PLT, MCV, MCH, MCHC, MPV, PDW, `LY%`, `MO%`, `GR%`, LY, MO, GR,blood_routine_sum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('idddddddddddddddds', $bloodRoutine->getUserId(), $bloodRoutine->getWBC(), $bloodRoutine->getRBC(), $bloodRoutine->getHGB(), $bloodRoutine->getHCT(), $bloodRoutine->getPLT(), $bloodRoutine->getMCV(), $bloodRoutine->getMCH(), $bloodRoutine->getMCHC(), $bloodRoutine->getMPV(), $bloodRoutine->getPDW(), $bloodRoutine->getLY1(), $bloodRoutine->getMO1(), $bloodRoutine->getGR1(), $bloodRoutine->getLY(), $bloodRoutine->getMO(), $bloodRoutine->getGR(), $bloodRoutine->getBloodRoutineSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

}