<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationLanguage
 *
 * @property int $application_id
 * @property int $application_type_id
 * @property int $language_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationLanguage whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationLanguage whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationLanguage whereLanguageId($value)
 *
 * @mixin \Eloquent
 */
class ApplicationLanguage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
