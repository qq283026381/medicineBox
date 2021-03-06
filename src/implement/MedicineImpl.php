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
        $query = 'SELECT * FROM medicine WHERE user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->mysql->closeConnection();
        return $result;
    }

    public function addMedicine($medicine)
    {
        $query = 'INSERT INTO medicine (user_id,medicine_name,medicine_production_date,medicine_validity,medicine_deadline,medicine_time,medicine_number) VALUES(?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ississs', $medicine->getUserId(), $medicine->getMedicineName(), $medicine->getMedicineProductionDate(), $medicine->getMedicineValidity(), $medicine->getMedicineDeadline(), $medicine->getMedicineTime(), $medicine->getMedicineNumber());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }

    public function updateMedicine($medicine)
    {
        $query = 'UPDATE medicine SET medicine_name=? , medicine_production_date=? , medicine_validity=?,medicine_deadline=? , medicine_number=? , medicine_time=? WHERE medicine_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssisssi', $medicine->getMedicineName(), $medicine->getMedicineProductionDate(), $medicine->getMedicineValidity(), $medicine->getMedicineDeadline(), $medicine->getMedicineNumber(), $medicine->getMedicineTime(), $medicine->getMedicineId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }

    public function deleteMedicine($userId, $medicineId)
    {
        $query = 'DELETE FROM medicine WHERE user_id=? AND medicine_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $userId, $medicineId);
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}