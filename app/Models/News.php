<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
        return \DB::table($this->table)->get();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }
}
