<?php

namespace App\Models;

use App\Traits\Audits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BaseModel
 *
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $created
 * @property-read mixed $deleted
 * @property-read mixed $updated
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel withoutTrashed()
 *
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    use Audits;
    use SoftDeletes;
}
