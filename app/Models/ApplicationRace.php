<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationRace
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $race_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRace query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRace whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRace whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRace whereRaceId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationRace extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
