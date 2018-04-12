<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 20:58
 */

require_once '../interface/IBiochemical.php';
require_once '../util/Mysql.php';

class BiochemicalImpl implements IBiochemical
{
    private $mysql;
    private $conn;

    /**
     * BiochemicalImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }

    public function addBiochemical($biochemical)
    {
        $query = 'INSERT INTO biochemical (user_id, protein, albumin, globulin, `A/G`, TBIL, DBIL, IBIL, ALT, AST, BUN, CRE, UA, TG, CHO, `HDL-C`, `LDL-C`, GLU, ALP,biochemical_sum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('idddddddddddddddddds',
            $biochemical->getUserId(),
            $biochemical->getProtein(),
            $biochemical->getAlbumin(),
            $biochemical->getGlobulin(),
            $biochemical->getAG(),
            $biochemical->getTBIL(),
            $biochemical->getDBIL(),
            $biochemical->getIBIL(),
            $biochemical->getALT(),
            $biochemical->getAST(),
            $biochemical->getBUN(),
            $biochemical->getCRE(),
            $biochemical->getUA(),
            $biochemical->getTG(),
            $biochemical->getCHO(),
            $biochemical->getHDLC(),
            $biochemical->getLDLC(),
            $biochemical->getGLU(),
            $biochemical->getALP(),
            $biochemical->getBiochemicalSum());
        $result = $stmt->execute();
        $number = $stmt->insert_id;
        $this->mysql->closeConnection();
        return array('result' => $result, 'number' => $number);
    }

    public function getBiochemical($biochemicalId, $userId)
    {
        $query = 'SELECT * FROM biochemical WHERE biochemical_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $biochemicalId, $userId);
        $result = $stmt->execute();
        $source = $stmt->get_result();
        $this->mysql->closeConnection();
        return array('result' => $result, 'source' => $source);
    }

    public function reviseBiochemical($biochemical, $biochemicalId)
    {
        $query = 'UPDATE biochemical SET protein=?,albumin=?,globulin=?,`A/G`=?,TBIL=?,DBIL=?,IBIL=?,ALT=?,AST=?,BUN=?,CRE=?,UA=?,TG=?,CHO=?,`HDL-C`=?,`LDL-C`=?,GLU=?,ALP=?,biochemical_sum=? WHERE biochemical_id=? AND user_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ddddddddddddddddddsii',
            $biochemical->getProtein(),
            $biochemical->getAlbumin(),
            $biochemical->getGlobulin(),
            $biochemical->getAG(),
            $biochemical->getTBIL(),
            $biochemical->getDBIL(),
            $biochemical->getIBIL(),
            $biochemical->getALT(),
            $biochemical->getAST(),
            $biochemical->getBUN(),
            $biochemical->getCRE(),
            $biochemical->getUA(),
            $biochemical->getTG(),
            $biochemical->getCHO(),
            $biochemical->getHDLC(),
            $biochemical->getLDLC(),
            $biochemical->getGLU(),
            $biochemical->getALP(),
            $biochemical->getBiochemicalSum(),
            $biochemicalId,
            $biochemical->getUserId());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}