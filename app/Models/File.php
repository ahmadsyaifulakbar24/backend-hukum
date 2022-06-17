<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use Uuids, HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'legal_product_id',
        'review_version_id',
        'finalization_id',
        'determination_id',
        'file',
        'type'
    ];

    public $timestamps = false;

    protected $appends = [
        'file_url'
    ];

    public function getFileUrlAttribute()
    {
        return !empty($this->attributes['file']) ? url('') . Storage::url($this->attributes['file']) : null;
    }

    public function legel_product()
    {
        return $this->belongsTo(LegalProduct::class, 'legel_product_id');
    }
}
