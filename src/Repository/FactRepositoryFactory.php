<?php


namespace App\Repository;


use App\Repository\FactRepository;
use GuzzleHttp\Client;
/**
 * Description of FactRepositoryFactory
 *
 * @author vasil
 */
class FactRepositoryFactory 
{
    /**
     * Creates Fact repository objects
     * 
     * @return FactRepository
     */
    public static function create() : FactRepository
    {
        return new FactRepository(new Client(), BASE_URL);
    }
}
