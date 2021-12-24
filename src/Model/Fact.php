<?php

/**
 * 
 */
namespace App\Model;

use DateTimeImmutable;
/**
 * Description of Fact
 * 
 * Creates Fact class
 * 
 * @author vasil
 */
class Fact 
{
    /**
     * Allowed types of animals
     */
    public const ALLOWED_TYPES = [self::CAT, self::DOG];
    
    /**
     * Constant for cat type
     */
    public const CAT = 'cat';
    
    /**
     * Constant for dog type
     */
    public const DOG = 'dog';
    
    /**
     * Variable for ID
     * 
     * @var string
     */
    protected string $id;
    
    /**
     * Variable for Text
     * 
     * @var string
     */
    protected string $text;
    
    /**
     * Variable for User
     * 
     * @var string
     */
    protected string $user;
    
    /**
     * Variable for Type of the fact
     * 
     * @var string
     */
    protected string $type;
    
    /**
     * Variable for Date of creation
     * 
     * @var DateTimeImmutable
     */
    protected  DateTimeImmutable $createdAt;
    
    /**
     * Variable for date of Update
     * 
     * @var DateTimeImmutable|null
     */
    protected ?DateTimeImmutable $updatedAt = null;
    
    /**
     * 
     * The Author of the fact
     * 
     * @var User|null
     */
    protected ?User $author = null;
    
    /**
     * Status of the Fact
     * 
     * @var Status
     */
    protected Status $status;
    
    /**
     * 
     * @return string
     */
    public function getId(): string 
    {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getText(): string 
    {
        return $this->text;
    }

    /**
     * 
     * @return string
     */
    public function getUser(): string 
    {
        return $this->user;
    }

    /**
     * 
     * @return string
     */
    public function getType(): string 
    {
        return $this->type;
    }

    /**
     * 
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable 
    {
        return $this->createdAt;
    }

    /**
     * 
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable 
    {
        return $this->updatedAt;
    }

    /**
     * 
     * @return User|null
     */
    public function getAuthor(): ?User 
    {
        return $this->author;
    }

    /**
     * 
     * @return Status
     */
    public function getStatus(): Status 
    {
        return $this->status;
    }

    /**
     * 
     * @param string $id
     * @return $this
     */
    public function setId(string $id) 
    {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param string $text
     * @return $this
     */
    public function setText(string $text) 
    {
        $this->text = $text;
        return $this;
    }

    /**
     * 
     * @param string $user
     * @return $this
     */
    public function setUser(string $user) 
    {
        $this->user = $user;
        return $this;
    }

    /**
     * 
     * @param string $type
     * @return $this
     */
    public function setType(string $type) 
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 
     * @param DateTimeImmutable $createdAt
     * @return $this
     */
    public function setCreatedAt(DateTimeImmutable $createdAt) 
    {
        return $this->createdAt = $createdAt;
        
    }

    /**
     * 
     * @param DateTimeImmutable|null $updatedAt
     * @return $this
     */
    public function setUpdatedAt(?DateTimeImmutable $updatedAt) 
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * 
     * @param User|null $author
     * @return $this
     */
    public function setAuthor(?User $author) 
    {
        $this->author = $author;
        return $this;
    }

    /**
     * 
     * @param Status $status
     * @return $this
     */
    public function setStatus(Status $status) 
    {
        $this->status = $status;
        return $this;
    }


}
