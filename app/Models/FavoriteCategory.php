<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteCategory extends Model
{
    protected $fillable = [
        'folder_name',
        'description'
    ];

    public function records()
    {
        return $this->hasMany('App\Models\Record');
    }
}
