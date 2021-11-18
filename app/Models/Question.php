<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function question_reply()
    {
        return $this->hasOne(QuestionReply::class, 'question_id', 'id');
    }
    public function stats()
    {
        return $this->hasone(QuestionStat::class, 'question_id', 'id');
    }

}
