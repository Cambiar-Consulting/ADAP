<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PhoneNumberType
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumberType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumberType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumberType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumberType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumberType whereName($value)
 *
 * @mixin \Eloquent
 */
class PhoneNumberType extends Model
{
    use HasFactory;
}
