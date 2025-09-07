<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationMaritalStatus
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $marital_status_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMaritalStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMaritalStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMaritalStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMaritalStatus whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMaritalStatus whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationMaritalStatus whereMaritalStatusId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationMaritalStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
