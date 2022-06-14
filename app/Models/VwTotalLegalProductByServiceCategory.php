<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwTotalLegalProductByServiceCategory extends Model
{
    use Uuids, HasFactory;
    protected $table = 'vw_total_legal_product_by_service_categories';
}
