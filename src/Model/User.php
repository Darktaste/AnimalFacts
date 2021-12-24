<?php

namespace App\Model;

/**
 * Description of User
 *
 * Model fo the User of the status
 * 
 * @author vasil
 */
class User 
{
    
    /**
     * ID of the user
     * 
     * @var string
     */
    protected string $id;
    
    /**
     * Photo of the user
     * 
     * @var string
     */
    protected string $photo;
    
    /**
     * User names
     * 
     * @var array
     */
    protected array $name;
    
    /**
     * Creates new User

     * @param string $id
     * @param string $photo
     * @param array $name
     * @return mixed
     */
    public function __construct(string $id, string $photo, array $name)
    {
        $this->id = (string) $id;
        $this->photo = (string) $photo;
        $this->name = (array) $name;
    }
    
    /**
     * 
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getPhoto(): string {
        return $this->photo;
    }

    /**
     * 
     * @return array
     */
    public function getName(): array {
        return $this->name;
    }

    /**
     * 
     * @param string $id
     * @return $this
     */
    public function setId(string $id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param string $photo
     * @return $this
     */
    public function setPhoto(string $photo) {
        $this->photo = $photo;
        return $this;
    }

    /**
     * 
     * @param array $name
     * @return $this
     */
    public function setName(array $name) {
        $this->name = $name;
        return $this;
    }


}
