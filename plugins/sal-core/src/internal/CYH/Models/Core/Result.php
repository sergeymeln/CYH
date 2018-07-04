<?php


namespace CYH\Models\Core;


class Result
{
    public $Status;
    public $Data;
    public $Code;

    public function SetStatus($status)
    {
        $this->Status = $status;
        return $this;
    }

    public function SetData($data)
    {
        $this->Data = $data;
        return $this;
    }

    public function SetCode($code)
    {
        $this->Code = $code;
        return $this;
    }
}