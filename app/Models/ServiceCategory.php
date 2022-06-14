<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceCategory extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'service_categories';
    protected $fillable = [
        'type',
        'name',
        'order'
    ];

    public $timestamps = false;

    public function scopeLegalProductByMonth($query, $year)
    {
        return $query->select(
            'service_categories.id',
            'service_categories.type',
            'service_categories.name',
            'service_categories.order',
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 1 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'january'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 2 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'february'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 3 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'march'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 4 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'april'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 5 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'may'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 6 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'june'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 7 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'july'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 8 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'august'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 9 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'september'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 10 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'october'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 11 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'november'"),
            DB::raw("SUM(CASE WHEN MONTH(b.finish_date) = 12 AND YEAR(b.finish_date) = ".$year." THEN 1 ELSE 0 END) AS 'december'"),
        )->leftJoin('legal_products as b', 'service_categories.id', '=', 'b.service_category_id' )
        ->groupBy('service_categories.id');
    }
}
