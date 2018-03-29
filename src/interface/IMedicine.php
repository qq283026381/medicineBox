<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/27
 * Time: 13:54
 */
interface IMedicine{
    public function getAllMedicine($user);
    public function addMedicine($medicine);
    public function updateMedicine($medicine);
}