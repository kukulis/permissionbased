<?php

namespace Kukulis\PermissionBased\Tests\Data;

class NoteType
{
    public $NOTE_CODE;

    /**
     * @param mixed $NOTE_CODE
     * @return NoteType
     */
    public function setNOTECODE($NOTE_CODE)
    {
        $this->NOTE_CODE = $NOTE_CODE;
        return $this;
    }

    /**
     * @param mixed $NOTE_NAME
     * @return NoteType
     */
    public function setNOTENAME($NOTE_NAME)
    {
        $this->NOTE_NAME = $NOTE_NAME;
        return $this;
    }
    public $NOTE_NAME;
}