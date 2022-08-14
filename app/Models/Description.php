<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    protected $fillable = [
        'text0', 'text1', 'text2', 'text3', 'text4', 'text5', 'text6', 'text7', 'text8', 'text9',
        'title0', 'title1', 'title2', 'title3', 'title4', 'title5', 'title6', 'title7', 'title8', 'title9',
    ];
}
