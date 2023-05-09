<?php
namespace App\Services;
use App\Repositories\ProductRepositories;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositories $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    // Lấy tất cả sản phẩm
    public function getAllProduct($search, $categoryId, $manufacturerId)
    {
        return $this->productRepository->getAll($search, $categoryId, $manufacturerId);
    }

    // Thêm sản phẩm
    public function createProduct($r)
    {
        $time = time();
        $data['name'] = $r['name'];
        $data['id_category'] = $r['id_category'];
        $data['id_manufacturer'] = $r['id_manufacturer'];
        $data['price'] = $r['price'];
        $data['description'] = $r['description'];
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        $file = $r['fileInput'];
        $fileName = rand(0,999) . '.' . $file->getClientOriginalExtension();
        $data['images'] = $fileName;

        $product = $this->productRepository->create($data);
        $productID = $product->id;

        $file->move(public_path('uploads/products/' . $productID), $fileName);

        return $product;
    }

    public function findProduct($id){
        return $this->productRepository->find($id);
    }


    public function updateProduct($r, $id){
        $product = $this->productRepository->find($id);
        $productID = $product->id;

        if ($product){

            $time = time();
            $data['name'] = $r['update_name'];
            $data['id_category'] = $r['update_category'];
            $data['id_manufacturer'] = $r['update_hangsx'];
            $data['price'] = $r['update_price'];
            $data['description'] = $r['update_description'];
            $data['updated_at'] = $time;

            if (isset($r['editIllustration'])){
                $path_unlink = 'uploads/products/' . $productID . '/' . $product->images;
                if (file_exists($path_unlink)) {
                    unlink($path_unlink);
                }
                $file = $r['editIllustration'];
                $fileName = rand(0,999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/' . $productID), $fileName);
                $data['images'] = $fileName;
            }


            return $this->productRepository->update($data, $id);
        }
    }

}
?>