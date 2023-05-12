<?php

namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\ProductInterface;
use App\Models\ImgSliderProduct;

class ProductRepositories extends BaseRepository implements ProductInterface
{
    protected $productModel;
    protected $imgSliderModel;

    public function __construct(Product $productModel, ImgSliderProduct $imgSliderModel)
    {
        $this->model = $productModel;
        $this->imgSliderModel = $imgSliderModel;

    }

    public function getAll($search, $categoryId, $manufacturerId)
    {
        $product = $this->model->newModelQuery();
        if ($search) {
            $product = $product->where('name', 'like', '%'.$search.'%');
        }
        if ($categoryId) {
            $product = $product->where('id_category', $categoryId);
        }
        if ($manufacturerId) {
            $product = $product->where('id_manufacturer', $manufacturerId);
        }

        return $product->orderByDesc('updated_at')->paginate(12);
    }

//    public function update($data, $id)
//    {
//        return $this->productModel->where('id', $id)->update($data);
//    }

    public function delete($id)
    {
        $productDelete = Product::destroy($id);
        $imgSliderDelete = ImgSliderProduct::where('id_product',$id)->delete($id);
        if ($productDelete && $imgSliderDelete)
        {
            return true;
        }else
        {
            return false;
        }
    }

    // Lấy sản phẩm gợi ý
    public function productSuggestion($productID, $id_category)
    {
        return $this->productModel->where('id_category', $id_category)->where('id', '!=', $productID)->orderByDesc('updated_at')->take(3)->get();
    }

    // Thêm ảnh slide
    public function addImgSliderProduct($data_img)
    {
        return ImgSliderProduct::create($data_img);
    }

    // Lấy tất cả ảnh slide trong update
    public function getAllImgSlider($productID)
    {
        return $this->imgSliderModel->where('id_product',$productID)->get();
    }

    // Update ảnh slide
    public function updateImgSlider($data_img, $id)
    {
        return $this->imgSliderModel->where('id', $id)->update($data_img);
    }

    // Xóa ảnh slide
    public function deleteOneImgSlider($id)
    {
        return ImgSliderProduct::destroy($id);
    }

    // ==============================================

    // Lấy One ảnh slide
    public function getOneImgSlider($id)
    {
        return ImgSliderProduct::find($id);
    }

}
?>
