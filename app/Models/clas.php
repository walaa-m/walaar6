<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    // Explicitly specify the table name if it's not the default plural form
    protected $table = 'classes'; 

    protected $fillable = [
        'class_title',
        'price',
        'description',
        'published',
    ];
}
