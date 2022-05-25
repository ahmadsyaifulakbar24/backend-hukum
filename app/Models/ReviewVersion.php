<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewVersion extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'review_versions';
    protected $fillable = [
        'review_id',
        'user_id',
        'version_name',
        'file'
    ];
}
