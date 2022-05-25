<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Determination extends Model
{
    use Uuids, HasFactory;

    protected $table = 'determinations';
    protected $fillable = [
        'user_id',
        'legal_product_id',
        'file'
    ];
}
