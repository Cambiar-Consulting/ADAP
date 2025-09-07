<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class MergedApplication extends BaseModel
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_by_id', 'updated_by_id', 'deleted_by_id', 'created_at', 'updated_at', 'deleted_at',
    ];
}
