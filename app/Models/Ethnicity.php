<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ethnicity
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Ethnicity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ethnicity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ethnicity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ethnicity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ethnicity whereName($value)
 *
 * @mixin \Eloquent
 */
class Ethnicity extends Model
{
    use HasFactory;
}
