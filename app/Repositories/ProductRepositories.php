<?php

namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\ProductInterface;

class ProductRepositories implements ProductInterface
{
    protected $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;

    }

    public function getAll()
    {   
        return $this->productModel->orderByDesc('updated_at')->paginate(12);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function create($data)
    {
        return Product::create($data);
    }

}
?>