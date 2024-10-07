<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'books';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable =
    [
        'title',
        'description',
        'author',
        'publication_date',
    ];
}
