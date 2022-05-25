<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use Uuids, HasFactory;

    protected $table = 'histories';
    protected $fillable = [
        'user_id',
        'review_id',
        'type'
    ];
}
