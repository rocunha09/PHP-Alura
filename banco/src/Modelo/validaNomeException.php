<?php
namespace Banco\Modelo;

use DomainException;

class validaNomeException extends DomainException
{
    public function __construct()
    {
        parent::__construct();
    }
}