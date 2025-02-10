<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Exception;
class StoreFilesService
{
public function storeFile($pathFile, $nameFile){
    try {
        $file = $nameFile->getClientOriginalName();
        Storage::disk('public')->putFileAs($pathFile,$nameFile,$file);
        return $pathFile.$file;
    }
    catch (Exception $e){
        throw new Exception('Failed to store file');
    }
}
}
