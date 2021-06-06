<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'language_id',
        'title',
        'summary',
        'image',
        'companies',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
