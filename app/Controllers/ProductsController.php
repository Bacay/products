<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductsController extends BaseController
{
    private $product;
    private $category;
    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
        $this->category = new \App\Models\CategoryModel();
    }
    public function edit($ProdId)
    {
        $data =[
            'product' => $this->product->findAll(),
            'pro' => $this->product->where('ProdId', $ProdId)->first(),
            'category' => $this->category->distinct()->findAll(),
        ];
            return view('products', $data);
    }
    public function save()
    {
        $ProdId =$_POST['ProdId'];
        $data = [
            'ProductName'=>$this->request->getVar('ProductName'),      
            'ProductDescription'=>$this->request->getVar('ProductDescription'),
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            'ProductQuantity'=>$this->request->getVar('ProductQuantity'),
            'ProductPrice'=>$this->request->getVar('ProductPrice'),
            ];
        if($ProdId!= null){
            $this->product->set($data)->where('ProdId', $ProdId)->update();
        }else{
            $this->product->save($data);
        }
        return redirect()->to('/products');
    
    }
    public function delete($ProdId)
    {
        //echo $id;
        $this->product->delete($ProdId);
        return redirect()->to('/products');
    }
    public function product($product)
    {
        echo $product;
    }
    public function Bacay()
    {
        $data['product'] = $this->product->FindAll();
        $data['category'] = $this->category->distinct()->findAll();
        return view('products', $data);
    }
    public function index()
    {
        
    }
     public function saveCat()
    {
        $CatId = $_POST['CatId'];
        $data = [
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            ];
            if($CatId != null){
                $this->category->set($data)->where('CatId', $CatId)->update();
            }else{
                $this->category->save($data);
            }  
            return redirect()->to('/products');
    }
    public function editCat($CatId)
    {
        $data =[
            'category' => $this->category->distinct()->findAll(),
            'product' => $this->product->findAll(),
            'cate' => $this->category->where('CatId', $CatId)->first(),
        ];
            return view('products', $data);
    }
    public function deleteCat($CatId)
    {
        //echo $id;
        $this->category->delete($CatId);
        return redirect()->to('/products');
    }
    
}
