<?php

namespace App\View;


/**
 * Description of view
 *
 * @author vasil
 */
class View 
{
    
    /**
     * The View directory
     * 
     * @var string
     */
    protected string $viewDirectory;
    
    /**
     * Creates new view
     * 
     * @param string $viewDirectory
     * @return mixed
     */
    public function __construct(string $viewDirectory)
    {
        $this->viewDirectory = $viewDirectory;
    }
    
    /**
     * Render view model
     * 
     * @param string $viewName
     * @param array $viewModel
     * @return string
     */
    public function render(string $viewName, array $viewModel) : string
    {
       $viewPath = $this->viewDirectory . '/' . $viewName . '.php';
       
        if (file_exists($viewPath)) {
            ob_start();
            extract($viewModel);
            include $viewPath;
            $result = ob_get_contents();
            ob_end_clean();
            return $result;
        }
        
        return $this->render('error/no_view', ['name' => $viewName]);
        
        
    }
}
