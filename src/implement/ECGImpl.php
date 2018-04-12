<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 19:55
 */

require_once '../interface/IECG.php';
require_once '../util/Mysql.php';

class ECGImpl implements IECG
{
    private $mysql;
    private $conn;

    /**
     * ECGImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addECG($ECG)
    {
        $query = 'INSERT INTO ecg (user_id, ECG, ECG_sum) VALUES (?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss', $ECG->getUserId(), $ECG->getECG(), $ECG->getECGSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getECG($ECGId, $userId)
    {
        $query = 'SELECT * FROM ecg WHERE ECG_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $ECGId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }

    public function reviseECG($ECG, $ECGId)
    {
        $query = 'UPDATE ecg SET ECG=?,ECG_sum=? WHERE ECG_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssii', $ECG->getECG(), $ECG->getECGSum(), $ECGId, $ECG->getUserId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}