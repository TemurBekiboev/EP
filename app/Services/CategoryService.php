<?php

namespace App\Services;

use App\Models\Category;
use App\Services\StoreFilesService;

class CategoryService
{
    protected $storeFileService;

    public function __construct(StoreFilesService $storeFilesService)
    {
        $this->storeFileService = $storeFilesService;
    }

    public function create($data){
       $filePath = 'storage/category';
       $fileName = $data['image'];
       $fileStore = $this->storeFileService->storeFile($filePath,$fileName);
        return Category::create(
            [
                'name' => $data['name'],
                'image'=> $fileStore,
            ]
        );
    }
    public function update(Category $category, $data){
        $category->update($data);
        return $category;
    }
    public function delete(Category $category){
        return $category->delete();
    }

}
