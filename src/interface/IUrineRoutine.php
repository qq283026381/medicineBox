<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 22:09
 */

interface IUrineRoutine
{
    public function addUrineRoutine($urineRoutine);

    public function getUrineRoutine($urineRoutineId, $userId);

    public function reviseUrineRoutine($urineRoutine, $urineRoutineId);
}