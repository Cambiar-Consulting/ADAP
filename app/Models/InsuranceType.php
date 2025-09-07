<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InsuranceType
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceType whereName($value)
 *
 * @mixin \Eloquent
 */
class InsuranceType extends Model
{
    use HasFactory;
}
