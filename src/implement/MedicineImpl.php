<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/27
 * Time: 13:56
 */
require_once '../util/Mysql.php';
require_once '../interface/IMedicine.php';

class MedicineImpl implements IMedicine
{
    private $mysql;
    private $conn;

    /**
     * MedicineImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function getAllMedicine($id)
    {
        $query='select * from medicine where user_id=?';
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function addMedicine($medicine)
    {
        $query = 'INSERT INTO medicine (user_id,medicine_name,medicine_production_date,medicine_validity,medicine_deadline,medicine_time,medicine_number) VALUES(?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ississi',$medicine->getUserId(), $medicine->getMedicineName(), $medicine->getMedicineProductionDate(), $medicine->getMedicineValidity(), $medicine->getMedicineDeadline(), $medicine->getMedicineTime(), $medicine->getMedicineNumber());
        return $stmt->execute();
    }
}