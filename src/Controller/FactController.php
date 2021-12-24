<?php

namespace App\Controller;

use App\Repository\FactRepository;
use App\View\View;

/**
 * Description of FactController
 *
 * @author vasil
 */
class FactController 
{
    /**
     * The fact repository object
     * 
     * @var FactRepository
     */
    protected FactRepository $repository;
    
    /**
     * The view
     * 
     * @var view
     */
    protected View $view;
    
    /**
     * New FactController object
     * 
     * @param FactRepository $repository
     * @param View $view
     */
    public function __construct(FactRepository $repository, View $view) 
    {
        $this->repository = $repository;
        $this->view = $view;
    }
    
    /**
     * List of facts
     * 
     * @param int $amount
     * @param string $type
     * @return string
     */
    public function list(int $amount, string $type) : string
    {
        $list = $this->repository->getRandomList($amount, $type);
        return $this->view->render('fact/list', ['list' => $list]);
    }
    
    /**
     * Single fact
     * 
     * @param string $id
     * @return string
     */
    public function single(string $id) : string
    {
        $fact = $this->repository->getFact($id);
        return $this->view->render('fact/single', ['fact' => $fact]);
    }
}
