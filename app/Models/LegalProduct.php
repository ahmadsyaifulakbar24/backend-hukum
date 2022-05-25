<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalProduct extends Model
{
    use Uuids, HasFactory;
    protected $table = 'legal_products';
    protected $fillable = [
        'created_by',
        'service_category_id',
        'title',
        'mandate_id',
        'completion_target',
        'status'
    ];
}
