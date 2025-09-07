<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationEthnicity
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $ethnicity_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationEthnicity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationEthnicity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationEthnicity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationEthnicity whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationEthnicity whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationEthnicity whereEthnicityId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationEthnicity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
