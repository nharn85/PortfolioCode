<?php

class Album
{
    private $m_name;

    function __construct($m_name)
    {
        $this->m_name = $m_name;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->m_name;
    }
}