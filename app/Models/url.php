<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class url extends Model
{
    use HasFactory;
    protected $appends = ['shortened_url'];
    protected $fillable =[
        'id',
        'destination',
        'slug',
        'created_at',
        'updated_at'
    ];
    public function getShortenedUrlAttribute(){
        return url('').'/'.$this->slug;
    }

}
