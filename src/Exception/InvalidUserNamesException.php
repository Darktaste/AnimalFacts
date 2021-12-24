<?php


namespace App\Exception;

use InvalidArgumentException;

/**
 * Description of InvalidUserNamesException
 *
 * Throws when array without first or last index is tried to be set for user names
 * 
 * @author vasil
 */
class InvalidUserNamesException extends InvalidArgumentException
{
    
}
