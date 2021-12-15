<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
      'app_name',
      'window_name',
      'event_type',
      'archived',
      'date',
      'time',
      'content'
    ];
    use HasFactory;
}
