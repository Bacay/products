<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CategoryController extends BaseController
{
    private $category;
    
    public function __construct()
    {
        $this->category = new \App\Models\CategoryModel();
    }
    public function saveCat()
    {
        $data = [
        
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            ];
            $this->category->save($data);
            return redirect()->to('/products');
        
    
    
    }
    public function index()
    {
        //
    }
}
