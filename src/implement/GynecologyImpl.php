<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:10
 */

require_once '../interface/IGynecology.php';
require_once '../util/Mysql.php';

class GynecologyImpl implements IGynecology
{
    private $mysql;
    private $conn;

    /**
     * GynecologyImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addGynecology($gynecology)
    {
        $query = 'INSERT INTO gynecology (user_id, vulva, vaginal, vaginal_secretion, cervix, palace, left_attachment, right_attachment, gynecology_sum) VALUES (?,?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('issssssss', $gynecology->getUserId(), $gynecology->getVulva(), $gynecology->getVaginal(), $gynecology->getVaginalSecretion(), $gynecology->getCervix(), $gynecology->getPalace(), $gynecology->getLeftAttachment(), $gynecology->getRightAttachment(), $gynecology->getGynecologySum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getGynecology($gynecologyId, $userId)
    {
        $query = 'SELECT * FROM gynecology WHERE gynecology_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $gynecologyId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }
}