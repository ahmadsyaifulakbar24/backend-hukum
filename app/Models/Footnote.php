<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footnote extends Model
{
    use Uuids, HasFactory;

    protected $table = 'footnotes';
    protected $fillable = [
        'review_version_id',
        'finalization_id',
        'determination_id',
        'note'
    ];

    public $timestamps = false;
}
