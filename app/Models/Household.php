<?php

namespace App\Models;

use App\Models\Lookups\ApplicationTypesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Household
 *
 * @property int $id
 * @property int $application_id
 * @property int $application_type_id
 * @property string|null $name
 * @property string|null $date_of_birth
 * @property string|null $relationship
 * @property string|null $income_source
 * @property string|null $gross_amount
 * @property string|null $payment_frequency_id
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Household newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Household newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Household query()
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereGrossAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereIncomeSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household wherePaymentFrequencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Household whereUpdatedById($value)
 *
 * @property-read \App\Models\NewApplication|null $newApplication
 * @property-read \App\Models\PaymentFrequency|null $payment_frequency
 * @property-read \App\Models\NewApplication|null $newapplication
 *
 * @mixin \Eloquent
 */
class Household extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newapplication(): HasOne
    {
        return $this->hasOne(NewApplication::class, 'id', 'application_id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function payment_frequency(): HasOne
    {
        return $this->hasOne(PaymentFrequency::class, 'id', 'payment_frequency_id');
    }
}
