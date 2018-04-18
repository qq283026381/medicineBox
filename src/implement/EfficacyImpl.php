<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/18
 * Time: 12:49
 */
require_once '../interface/IEfficacy.php';
require_once '../util/Mysql.php';

class EfficacyImpl implements IEfficacy
{
    private $mysql;
    private $conn;

    /**
     * EfficacyImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }


    public function getAllEfficacy()
    {
        $query = 'SELECT * FROM efficacy';
        $result = $this->conn->query($query);
        $this->mysql->closeConnection();
        return $result;
    }

    public function getEfficacyImg($id)
    {
        $query = 'SELECT img FROM efficacy WHERE efficacy_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }
}