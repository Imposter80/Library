<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'libraries';

    protected $fillable = [
        'name',
        'city_id'];


    protected $casts = [
        'name'=> 'string',
        'city_id' => 'int'];


    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
