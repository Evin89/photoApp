<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'userName', 'description'];

    protected $hidden = [];

    public function photoComments()
    {
        return $this->hasMany(Comment::class);
    }
}
