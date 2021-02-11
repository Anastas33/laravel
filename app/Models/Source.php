<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'url'];

    public function news(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(News::class, 'source_id', 'id');
    }
}
