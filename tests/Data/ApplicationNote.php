<?php

namespace Kukulis\PermissionBased\Tests\Data;

class ApplicationNote
{
    /**
     * @param mixed $APPLICATION_ID
     * @return ApplicationNote
     */
    public function setAPPLICATIONID($APPLICATION_ID)
    {
        $this->APPLICATION_ID = $APPLICATION_ID;
        return $this;
    }

    /**
     * @param mixed $NOTE_CODE
     * @return ApplicationNote
     */
    public function setNOTECODE($NOTE_CODE)
    {
        $this->NOTE_CODE = $NOTE_CODE;
        return $this;
    }

    /**
     * @param mixed $NOTE_VALUE
     * @return ApplicationNote
     */
    public function setNOTEVALUE($NOTE_VALUE)
    {
        $this->NOTE_VALUE = $NOTE_VALUE;
        return $this;
    }
    public $APPLICATION_ID;

    public $NOTE_CODE;

    public $NOTE_VALUE;
}