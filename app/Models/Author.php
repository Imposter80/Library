<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'birthday',
        'dead'];


    protected $casts = [
        'name' => 'string',
        'birthday'=> 'date',
        'dead'=> 'date'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }



}


