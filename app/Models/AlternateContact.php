<?php

namespace App\Models;

use App\Models\Lookups\ApplicationTypesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\AlternateContact
 *
 * @property int $id
 * @property int $application_id
 * @property int $application_type_id
 * @property int $address_type_id
 * @property string|null $name
 * @property string|null $organization
 * @property string|null $relationship
 * @property string|null $phone
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereAddressTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlternateContact whereUpdatedById($value)
 *
 * @property-read \App\Models\NewApplication|null $newApplication
 * @property-read \App\Models\NewApplication|null $newapplication
 *
 * @mixin \Eloquent
 */
class AlternateContact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newapplication(): HasOne
    {
        return $this->hasOne(NewApplication::class, 'id', 'application_id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }
}
