<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finalization extends Model
{
    use Uuids, HasFactory;

    protected $table = 'finalizations';
    protected $fillable = [
        'legal_product_id',
        'file',
        'type',
        'status'
    ];
}
