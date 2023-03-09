<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService
{
    public function uploadImage(UploadedFile $file): string
    {
        $path = $file->storeAs('news', $file->hashName(), 'public');
        if ($path === false) {
            throw new UploadException('Не удалоь загрузить файл!');
        }

        return $path;
    }
}
