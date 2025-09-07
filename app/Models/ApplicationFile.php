<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationFile
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $file_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFile whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFile whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFile whereFileId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
