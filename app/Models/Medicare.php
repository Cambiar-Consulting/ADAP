<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Medicare
 *
 * @property int $id
 * @property string|null $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Medicare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medicare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medicare query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medicare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medicare whereName($value)
 *
 * @mixin \Eloquent
 */
class Medicare extends Model
{
    use HasFactory;
}
