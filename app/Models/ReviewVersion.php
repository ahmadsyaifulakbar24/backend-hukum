<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected $appends = [
        'file_url'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getFileUrlAttribute()
    {
        return !empty($this->attributes['file']) ? url('') . Storage::url($this->attributes['file']) : null;
    }
}
