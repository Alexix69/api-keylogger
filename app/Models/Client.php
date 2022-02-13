<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nickname',
        'desktop_name',
        //'is_active'
    ];
    use HasFactory;

    public function records()
    {
        return $this->hasMany('App\Models\Record');
    }
}
