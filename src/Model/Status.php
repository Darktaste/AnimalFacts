<?php

namespace App\Model;

/**
 * Description of Status
 *
 * Model for the status of the fact
 * 
 * @author vasil
 */
class Status 
{
    
    /**
     * Is the fact verified
     * 
     * @var bool
     */
    protected bool $verified;
    
    /**
     * Verification counter
     * 
     * @var int
     */
    protected int $sentCount;
    
    /**
     * Creates status object
     * 
     * @param bool|null $verified
     * @param int|null $sentCount
     * @return mixed
     */
    public function __construct(?bool $verified, ?int $sentCount)
    {
         $this->verified = (bool) $verified;
         $this->sentCount = (int) $sentCount;
    }
    
    /**
     * heck whether the fact is verified
     * 
     * @return bool
     */
    public function isVerified():bool
    {
        return $this->verified;
    }
    
    
    public function getVerified(): bool {
        return $this->verified;
    }

    public function getSentCount(): int {
        return $this->sentCount;
    }

    public function setVerified(bool $verified) {
        $this->verified = $verified;
        return $this;
    }

    public function setSentCount(int $sentCount) {
        $this->sentCount = $sentCount;
        return $this;
    }




}
