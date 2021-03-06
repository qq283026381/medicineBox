<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 14:30
 */
require_once '../util/Mysql.php';
require_once '../interface/IRecording.php';

class RecordingImpl implements IRecording
{
    private $mysql;
    private $conn;

    /**
     * RecordingImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addRecording($recording)
    {
        $query = 'INSERT INTO recording(user_id,name,gender,time) VALUES(?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('isss', $recording->getUserId(), $recording->getName(), $recording->getGender(), $recording->getTime());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getAllRecordings($userId)
    {
        $query = 'SELECT * FROM recording WHERE user_id=? ORDER BY time';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->mysql->closeConnection();
        return $result;
    }

    public function updateRecording($method, $updateId, $recordingId)
    {
        $query = 'UPDATE recording SET ' . $method . '_id=? WHERE recording_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $updateId, $recordingId);
        $result = $stmt->execute();
        return array('result' => $result);
    }

    public function getRecording($recordingId)
    {
        $query = 'SELECT * FROM recording WHERE recording_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $recordingId);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->mysql->closeConnection();
        return $result;
    }

    public function deleteRecording($recordingId, $userId)
    {
        $query = 'DELETE FROM recording WHERE recording_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $recordingId, $userId);
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }

    public function reviseRecording($recording, $recordingId)
    {
        $query = 'UPDATE recording SET name=?,gender=?,time=? WHERE recording_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssii', $recording->getName(), $recording->getGender(), $recording->getTime(), $recordingId, $recording->getUserId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }

    public function getChartItems($userId, $name, $gender)
    {
        $query = 'SELECT height,weight,BMI,blood_pressure,time FROM internal i LEFT JOIN recording r ON i.user_id=r.user_id AND i.internal_id=r.internal_id WHERE r.user_id=? AND r.name=? AND r.gender=? ORDER BY r.time';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss', $userId, $name, $gender);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }
}