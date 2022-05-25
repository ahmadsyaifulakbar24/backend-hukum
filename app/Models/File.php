<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use Uuids, HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'legal_product_id',
        'review_version_id',
        'file',
        'status'
    ];

    public $timestamps = false;
}
