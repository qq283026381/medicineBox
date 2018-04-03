<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/20
 * Time: 14:45
 */
require_once '../util/Mysql.php';
require_once '../model/DiagnosisModel.php';
require_once '../interface/IDiagnosis.php';

class DiagnosisImpl implements IDiagnosis
{
    private $mysql;
    private $conn;

    /**
     * DiagnosisImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function getAllDiagnosis()
    {
        $query = "SELECT DISTINCT diagnosis_name ,diagnosis_type FROM diagnosis";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getProbability($diagnosis)
    {
        $query = 'SELECT disease_id, diagnosis_probability FROM diagnosis WHERE diagnosis_type=? AND diagnosis_name=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $diagnosis->getDiagnosisType(), $diagnosis->getDiagnosisName());
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getDiseaseProbability($diseaseId)
    {
        $query = 'SELECT disease_probability,disease_name FROM disease WHERE disease_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $diseaseId);
        $stmt->execute();
        return $stmt->get_result();
    }
}