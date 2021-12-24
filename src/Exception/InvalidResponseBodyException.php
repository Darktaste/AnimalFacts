<?php

namespace App\Exception;

use InvalidArgumentException;
/**
 * Description of InvalidResponseBodyException
 *
 * Throws exception when a problem with json decoding of the response
 * body is raised
 * 
 * @author vasil
 */
class InvalidResponseBodyException extends InvalidArgumentException
{
    
}
