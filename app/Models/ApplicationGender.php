<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationGender
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $gender_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationGender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationGender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationGender query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationGender whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationGender whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationGender whereGenderId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationGender extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
