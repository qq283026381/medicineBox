<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:57
 */
require_once '../interface/IOphthalmology.php';
require_once '../util/Mysql.php';

class OphthalmologyImpl implements IOphthalmology
{
    private $mysql;
    private $conn;

    /**
     * OphthalmologyImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addOphthalmology($ophthalmology)
    {
        $query = 'INSERT INTO ophthalmology (user_id, conjunctiva, fundus, iris, cornea, lens, ophthalmology_sum) VALUES(?,?,?,?,?,?,?) ';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('issssss', $ophthalmology->getUserId(), $ophthalmology->getConjunctiva(), $ophthalmology->getFundus(), $ophthalmology->getIris(), $ophthalmology->getCornea(), $ophthalmology->getLens(), $ophthalmology->getOphthalmologySum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getOphthalmology($ophthalmologyId, $userId)
    {
        $query = 'SELECT * FROM ophthalmology WHERE ophthalmology_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $ophthalmologyId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }
}