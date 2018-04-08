<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 14:29
 */
interface IRecording
{
    public function addRecording($recording);

    public function getAllRecordings($userId);

    public function updateRecording($method, $updateId, $recordingId);

    public function getRecording($recordingId);
}