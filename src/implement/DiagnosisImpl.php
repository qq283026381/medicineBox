<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/20
 * Time: 14:45
 */
require_once '../util/Mysql.php';
require_once '../model/DiseaseModel.php';
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
}