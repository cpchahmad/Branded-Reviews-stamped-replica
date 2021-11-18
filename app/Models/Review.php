<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function review_reply()
    {
        return $this->hasOne(ReviewReply::class, 'review_id', 'id');
    }
    public function medias()
    {
        return $this->hasMany(ReviewMedia::class, 'review_id', 'id');
    }
    public function stats()
    {
        return $this->hasone(ReviewStat::class, 'review_id', 'id');
    }
}
