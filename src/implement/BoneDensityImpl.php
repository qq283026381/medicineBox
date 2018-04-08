<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:57
 */

require_once '../interface/IBoneDensity.php';
require_once '../util/Mysql.php';

class BoneDensityImpl implements IBoneDensity
{
    private $mysql;
    private $conn;

    /**
     * BoneDensityImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addBoneDensity($boneDensity)
    {
        $query = 'INSERT INTO bone_density (user_id, bone_density_sum) VALUES (?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $boneDensity->getUserId(), $boneDensity->getBoneDensitySum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

}