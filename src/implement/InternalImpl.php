<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 19:10
 */
require_once '../util/Mysql.php';
require_once '../interface/IInternal.php';

class InternalImpl implements IInternal
{
    private $mysql;
    private $conn;

    /**
     * InternalImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addInternal($internal)
    {
        $query = 'INSERT INTO internal (user_id, height, weight, BMI, blood_pressure,heart_rate,heart,noise,liver,spleen,lung,internal_sum) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iiddssssssss', $internal->getUserId(), $internal->getHeight(), $internal->getWeight(), $internal->getBMI(), $internal->getBloodPressure(), $internal->getHeartRate(), $internal->getHeart(), $internal->getNoise(), $internal->getLiver(), $internal->getSpleen(), $internal->getLung(), $internal->getInternalSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

}