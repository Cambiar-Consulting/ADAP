<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FileType
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FileType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileType whereName($value)
 *
 * @mixin \Eloquent
 */
class FileType extends Model
{
    use HasFactory;
}
