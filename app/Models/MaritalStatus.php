<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MaritalStatus
 *
 * @property int $id
 * @property string|null $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|MaritalStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaritalStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaritalStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|MaritalStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaritalStatus whereName($value)
 *
 * @mixin \Eloquent
 */
class MaritalStatus extends Model
{
    use HasFactory;

    protected $guarded = [];
}
