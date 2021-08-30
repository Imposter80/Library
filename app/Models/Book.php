<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $table = 'books';


    protected $fillable = [
        'title',
        'pages',
        'redaction',
        'author_id',
        'library_id'];


    protected $casts = [
        'title'=> 'string',
        'pages' =>'int',
        'redaction'=>'date',
        'author_id'=>'int',
        'library_id'=>'int'];

    public function author()
    {
        return $this->hasOne(Author::class);
    }
    public function library()
    {
        return $this->hasOne(Library::class);
    }


}
