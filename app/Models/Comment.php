<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Uuids, HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'review_id',
        'finalization_id',
        'comment'
    ];
}
