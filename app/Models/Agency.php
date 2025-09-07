<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agency
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Agency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agency whereUpdatedById($value)
 *
 * @mixin \Eloquent
 */
class Agency extends Model
{
    use HasFactory;
}
