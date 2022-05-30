<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
