<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 21:39
 */

interface IBloodRoutine
{
    public function addBloodRoutine($bloodRoutine);

    public function getBloodRoutine($bloodRoutineId, $userId);

    public function reviseBloodRoutine($bloodRoutine, $bloodRoutineId);
}