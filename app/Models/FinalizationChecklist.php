<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalizationChecklist extends Model
{
    use Uuids, HasFactory;

    protected $table = 'finalization_checklists';
    protected $fillable = [
        'finalization_id',
        'checklist'
    ];

    public $timestamps = false;
}
