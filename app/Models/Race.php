<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Race
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Race newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Race newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Race query()
 * @method static \Illuminate\Database\Eloquent\Builder|Race whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Race whereName($value)
 *
 * @mixin \Eloquent
 */
class Race extends Model
{
    use HasFactory;
}
