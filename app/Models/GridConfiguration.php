<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GridConfiguration extends Model
{
    use HasFactory;
    protected $fillable = [
        'column_name',
        'is_visible'
    ];

    protected $casts = [
        'is_visible' => 'boolean'
    ];
}
