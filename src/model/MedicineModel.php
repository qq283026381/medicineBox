<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/27
 * Time: 13:52
 */
class MedicineModel
{
    private $medicineId;
    private $userId;
    private $medicineName;
    private $medicineProductionDate;
    private $medicineValidity;
    private $medicineDeadline;
    private $medicineTime;
    private $medicineNumber;

    /**
     * MedicineModel constructor.
     * @param $medicineId
     * @param $userId
     * @param $medicineName
     * @param $medicineProductionDate
     * @param $medicineValidity
     * @param $medicineDeadline
     * @param $medicineTime
     * @param $medicineNumber
     */
    public function __construct($medicineId, $userId, $medicineName, $medicineProductionDate, $medicineValidity, $medicineDeadline, $medicineTime, $medicineNumber)
    {
        $this->medicineId = $medicineId;
        $this->userId = $userId;
        $this->medicineName = $medicineName;
        $this->medicineProductionDate = $medicineProductionDate;
        $this->medicineValidity = $medicineValidity;
        $this->medicineDeadline = $medicineDeadline;
        $this->medicineTime = $medicineTime;
        $this->medicineNumber = $medicineNumber;
    }

    /**
     * @return mixed
     */
    public function getMedicineId()
    {
        return $this->medicineId;
    }

    /**
     * @param mixed $medicineId
     */
    public function setMedicineId($medicineId)
    {
        $this->medicineId = $medicineId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getMedicineName()
    {
        return $this->medicineName;
    }

    /**
     * @param mixed $medicineName
     */
    public function setMedicineName($medicineName)
    {
        $this->medicineName = $medicineName;
    }

    /**
     * @return mixed
     */
    public function getMedicineProductionDate()
    {
        return $this->medicineProductionDate;
    }

    /**
     * @param mixed $medicineProductionDate
     */
    public function setMedicineProductionDate($medicineProductionDate)
    {
        $this->medicineProductionDate = $medicineProductionDate;
    }

    /**
     * @return mixed
     */
    public function getMedicineValidity()
    {
        return $this->medicineValidity;
    }

    /**
     * @param mixed $medicineValidity
     */
    public function setMedicineValidity($medicineValidity)
    {
        $this->medicineValidity = $medicineValidity;
    }

    /**
     * @return mixed
     */
    public function getMedicineDeadline()
    {
        return $this->medicineDeadline;
    }

    /**
     * @param mixed $medicineDeadline
     */
    public function setMedicineDeadline($medicineDeadline)
    {
        $this->medicineDeadline = $medicineDeadline;
    }

    /**
     * @return mixed
     */
    public function getMedicineTime()
    {
        return $this->medicineTime;
    }

    /**
     * @param mixed $medicineTime
     */
    public function setMedicineTime($medicineTime)
    {
        $this->medicineTime = $medicineTime;
    }

    /**
     * @return mixed
     */
    public function getMedicineNumber()
    {
        return $this->medicineNumber;
    }

    /**
     * @param mixed $medicineNumber
     */
    public function setMedicineNumber($medicineNumber)
    {
        $this->medicineNumber = $medicineNumber;
    }

}