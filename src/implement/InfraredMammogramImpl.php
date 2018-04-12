<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:23
 */

require_once '../interface/IInfraredMammogram.php';
require_once '../util/Mysql.php';

class InfraredMammogramImpl implements IInfraredMammogram
{
    private $mysql;
    private $conn;

    /**
     * InfraredMammogramImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addInfraredMammogram($infraredMammogram)
    {
        $query = 'INSERT INTO infrared_mammogram (user_id, left_breast, right_breast, infrared_mammogram_sum) VALUES (?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('isss', $infraredMammogram->getUserId(), $infraredMammogram->getLeftBreast(), $infraredMammogram->getRightBreast(), $infraredMammogram->getInfraredMammogramSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getInfraredMammogram($infraredMammogramId, $userId)
    {
        $query = 'SELECT * FROM infrared_mammogram WHERE infrared_mammogram_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $infraredMammogramId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }

    public function reviseInfraredMammogram($infraredMammogram, $infraredMammogramId)
    {
        $query = 'UPDATE infrared_mammogram SET left_breast=?,right_breast=?,infrared_mammogram_sum=? WHERE infrared_mammogram_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssii', $infraredMammogram->getLeftBreast(), $infraredMammogram->getRightBreast(), $infraredMammogram->getInfraredMammogramSum(), $infraredMammogramId, $infraredMammogram->getUserId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}