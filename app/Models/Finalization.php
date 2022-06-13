<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Finalization extends Model
{
    use Uuids, HasFactory;

    protected $table = 'finalizations';
    protected $fillable = [
        'legal_product_id',
        'file',
        'type',
    ];

    protected $appends = [
        'file_url'
    ];
    
    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }

    public function getFileUrlAttribute()
    {
        return !empty($this->attributes['file']) ? url('') . Storage::url($this->attributes['file']) : null;
    }

    public function legal_product()
    {
        return $this->belongsTo(LegalProduct::class, 'legal_product_id');
    }

    public function footnote()
    {
        return $this->hasMany(Footnote::class, 'finalization_id');
    }

    public function note()
    {
        return $this->hasMany(File::class, 'finalization_id');
    }
}
