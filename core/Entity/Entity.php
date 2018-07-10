<?php

namespace Core\Entity;

abstract class Entity
{
    public function __get($key ='Id')
    {
        $method = 'get'. ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
