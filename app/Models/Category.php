<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getAllCategories(): array
    {
        return DB::table($this->table)->get()->toArray();
    }

    public function getCategory(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
