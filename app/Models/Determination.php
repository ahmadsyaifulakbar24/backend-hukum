<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\NullableType;

class Determination extends Model
{
    use Uuids, HasFactory;

    protected $table = 'determinations';
    protected $fillable = [
        'user_id',
        'legal_product_id',
        'file'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function footnote()
    {
        return $this->hasMany(Footnote::class, 'determination_id');
    }
}
