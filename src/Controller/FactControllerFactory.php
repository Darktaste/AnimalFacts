<?php


namespace App\Controller;


use App\Repository\FactRepositoryFactory;
use App\Repository\FactRepository;
use App\View\View;
/**
 * Description of FactControllerFactory
 *
 * @author vasil
 */
class FactControllerFactory 
{
    
    /**
     * Creates the FactControllers objects
     * 
     * @param View $view
     * @return FactController
     */
    public static function create(View $view) : FactController
    {
        $repository = FactRepositoryFactory::create();
        return new FactController($repository, $view);
    }
}
