<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:23
 */

require_once '../interface/ISurgical.php';
require_once '../util/Mysql.php';

class SurgicalImpl implements ISurgical
{
    private $mysql;
    private $conn;

    /**
     * SurgicalImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addSurgical($surgical)
    {
        $query = 'INSERT INTO surgical (user_id, skin, thyroid, lymph_node, spin, limb_joint, surgical_sum) VALUES (?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('issssss', $surgical->getUserId(), $surgical->getSkin(), $surgical->getThyroid(), $surgical->getLymphNode(), $surgical->getSpin(), $surgical->getLimbJoint(), $surgical->getSurgicalSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getSurgical($surgicalId, $userId)
    {
        $query = 'SELECT * FROM surgical WHERE surgical_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $surgicalId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }

    public function reviseSurgical($surgical, $surgicalId)
    {
        $query = 'UPDATE surgical SET skin=?,thyroid=?,lymph_node=?,spin=?,limb_joint=?,surgical_sum=? WHERE surgical_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssssii',
            $surgical->getSkin(),
            $surgical->getThyroid(),
            $surgical->getLymphNode(),
            $surgical->getSpin(),
            $surgical->getLimbJoint(),
            $surgical->getSurgicalSum(),
            $surgicalId,
            $surgical->getUserId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}