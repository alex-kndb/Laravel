<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoriesTrait
{
    public function getCategories() : array
    {
        $categoriesArr = [];
        $categories = ['Politics', 'Economics', 'Sport', 'Science', 'Nature'];
        for ($i = 1; $i <= count($categories); $i++) {
            $categoriesArr[] = [
                'id' => $i,
                'title' => $categories[$i - 1]
            ];
        }
        return $categoriesArr;
    }
}
