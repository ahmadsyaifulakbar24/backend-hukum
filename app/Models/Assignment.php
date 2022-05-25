<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'assignments';
    protected $fillable = [
        'legal_product_id',
        'user_id'
    ];
}
