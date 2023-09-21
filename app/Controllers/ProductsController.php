<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductsController extends BaseController
{
    private $product;
    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
    }
    public function edit($ProdId)
    {
        $data =[
            'product' => $this->product->findAll(),
            'pro' => $this->product->where('ProdId', $ProdId)->first(),
        ];
            return view('products', $data);
    }
    public function save()
    {
        $ProdId =$_POST['ProdId'];
        $data = [
            'ProductName'=>$this->request->getVar('ProductName'),      
            'ProductDescription'=>$this->request->getVar('ProductDescription'),
            'ProductDescription'=>$this->request->getVar('ProductDescription'),
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
        return view('products', $data);
    }
    public function index()
    {
        //
    }
    
}
