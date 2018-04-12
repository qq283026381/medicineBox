<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:40
 */
require_once '../util/Mysql.php';
require_once '../interface/IBScan.php';

class BScanImpl implements IBScan
{
    private $mysql;
    private $conn;

    /**
     * BScanImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addBScan($BScan)
    {
        $query = 'INSERT INTO b_scan (user_id, B_scan, B_scan_sum) VALUES (?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss', $BScan->getUserId(), $BScan->getBScan(), $BScan->getBScanSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getBScan($BScanId, $userId)
    {
        $query = 'SELECT * FROM b_scan WHERE B_scan_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $BScanId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }

    public function reviseBScan($BScan, $BScanId)
    {
        $query = 'UPDATE B_scan SET B_scan=?,B_scan_sum=? WHERE B_scan_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssii', $BScan->getBScan(), $BScan->getBScanSum(), $BScanId, $BScan->getUserId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}