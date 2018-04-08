<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 20:42
 */

require_once '../interface/IXRay.php';
require_once '../util/Mysql.php';

class XRayImpl implements IXRay
{
    private $mysql;
    private $conn;

    /**
     * XRayImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addXRay($XRay)
    {
        $query = 'INSERT INTO x_ray (user_id, X_ray, X_ray_sum) VALUES (?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss', $XRay->getUserId(), $XRay->getXRay(), $XRay->getXRaySum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

}