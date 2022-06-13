<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
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
        'progress',
        'status',
        'finish_date',
        'finalization_progress',
        'finalization_finish_date'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }

    public function getFinishDateAttribute($date) {
        return !empty($this->attributes['finish_date']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }

    public function getFinalizationFinishDateAttribute($date) {
        return !empty($this->attributes['finalization_finish_date']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }

    public function user_created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
  
    public function mandate()
    {
        return $this->belongsTo(Param::class, 'mandate_id');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'legal_product_id');
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'legal_product_id');
    }

    public function determination()
    {
        return $this->hasOne(Determination::class, 'legal_product_id');
    }
}
