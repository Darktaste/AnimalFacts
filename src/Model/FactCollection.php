<?php

namespace App\Model;

use ArrayObject;
use App\Exception\InvalidCollectionObjectException;
/**
 * Description of FactCollection
 *
 * @author vasil
 */
class FactCollection extends ArrayObject 
{
    
    /**
     * Override the original method to validate the value is Fact object
     * 
     * @param mixed $index
     * @param mixed $newval
     * @return void
     */
    public function offsetSet(mixed $index, mixed $value) : void
    {
         $this->ensureFactObject($value);
         $this->offsetSet($index, $value);
        
    }
    
    /**
     * Validate the object is Fact instance
     * 
     * @param object $object
     * @return void
     * @throws InvalidCollectionObjectException
     */
    protected function ensureFactObject(object $object) : void
    {
        if(!$object instanceof Fact){
            throw new InvalidCollectionObjectException('Invalid object');
        }
    }
}
