<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use Uuids, HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'legal_product_id',
        'title',
        'status'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function legal_product()
    {
        return $this->belongsTo(LegalProduct::class, 'legal_product_id');
    }

    public function review_version()
    {
        return $this->hasMany(ReviewVersion::class, 'review_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'review_id');
    }
}
