<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'app_name',
        'window_name',
        //'event_type',
        'archived',
        'favorite',
        'date',
        'time',
        'type',
        'content',
        'client_id',
        'favorite_category_id'
    ];
    use HasFactory;

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function category()
    {
       return $this->belongsTo('App\Models\FavoriteCategory');
    }
}
