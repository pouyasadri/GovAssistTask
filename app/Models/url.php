<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class url extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'destination',
        'slug',
        'created_at',
        'updated_at'
    ];
    private $slug;
    protected $appends = ['shortened_url'];
    public function getShortenedUrlAttribute($value){
        return url('').'/'.$this->slug;
    }
}
