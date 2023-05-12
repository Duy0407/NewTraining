<?php
namespace App\Services;
use App\Interfaces\CategoryInterface;

class CategoryService
{
	protected $cateRepository;
	public function __construct(CategoryInterface $cateRepository)
	{
		$this->cateRepository = $cateRepository;
	}

	public function getAllCategory(){
		return $this->cateRepository->getAllCategory();
	}
}
?>
