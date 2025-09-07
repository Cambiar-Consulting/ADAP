<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationMedicare
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $medicare_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMedicare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMedicare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMedicare query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMedicare whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMedicare whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMedicare whereMedicareId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationMedicare extends Model
{
    use HasFactory;
}
