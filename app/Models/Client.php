<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nickname',
        'desktop_name',
        'is_active'
    ];
    use HasFactory;

    public function records()
    {
        return $this->hasMany('App\Models\Record');
    }
}
