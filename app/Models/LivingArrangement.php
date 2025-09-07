<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LivingArrangement
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LivingArrangement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LivingArrangement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LivingArrangement query()
 * @method static \Illuminate\Database\Eloquent\Builder|LivingArrangement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LivingArrangement whereName($value)
 *
 * @mixin \Eloquent
 */
class LivingArrangement extends Model
{
    use HasFactory;
}
