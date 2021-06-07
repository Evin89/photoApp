<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = "id";

    protected $fillable = ['body', 'photo_id'];

    // Comment belongs to a photo
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
