<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationInsurance
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $insurance_type_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInsurance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInsurance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInsurance query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInsurance whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInsurance whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInsurance whereInsuranceTypeId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationInsurance extends Model
{
    use HasFactory;
}
