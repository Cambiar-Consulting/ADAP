<?php

namespace App\Models;

use App\Models\Lookups\ApplicationTypesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\PhoneNumber
 *
 * @property int $id
 * @property int $application_id
 * @property int $application_type_id
 * @property string|null $number
 * @property string|null $type
 * @property int $can_contact
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereCanContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereUpdatedById($value)
 *
 * @property int $phone_number_type_id
 * @property-read \App\Models\NewApplication|null $newApplication
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber wherePhoneNumberTypeId($value)
 *
 * @property-read \App\Models\NewApplication|null $newapplication
 *
 * @mixin \Eloquent
 */
class PhoneNumber extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newapplication(): HasOne
    {
        return $this->hasOne(NewApplication::class, 'id', 'application_id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function type(): HasOne
    {
        return $this->hasOne(PhoneNumberType::class, 'id', 'phone_number_type_id');
    }
}
