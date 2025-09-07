<?php

namespace App\Models;

use App\Models\Lookups\ApplicationTypesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $application_id
 * @property int $application_type_id
 * @property int $address_type_id
 * @property string|null $street
 * @property string|null $apt_no
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zipcode
 * @property string|null $county
 * @property int $can_contact
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAptNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCanContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZipcode($value)
 *
 * @property-read \App\Models\NewApplication|null $newApplication
 * @property-read \App\Models\AddressType|null $type
 * @property-read \App\Models\NewApplication|null $newapplication
 *
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newapplication(): HasOne
    {
        return $this->hasOne(NewApplication::class, 'id', 'application_id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function type(): HasOne
    {
        return $this->hasOne(AddressType::class);
    }
}
