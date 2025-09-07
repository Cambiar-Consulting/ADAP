<?php

namespace App\Models;

use App\Models\Lookups\ApplicationTypesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\NewApplication
 *
 * @property int $id
 * @property int $application_type_id
 * @property int $applicant_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $alias
 * @property \Illuminate\Support\Carbon|null $date_of_birth
 * @property string|null $ssn
 * @property string|null $email
 * @property string|null $race_other
 * @property string|null $language_other
 * @property int|null $language_services
 * @property int|null $other_health_coverage
 * @property int|null $health_insurance_premiums
 * @property string|null $medicaid_spenddown
 * @property string|null $medicaid_denial
 * @property int|null $living_arrangement_id
 * @property string|null $signed_at
 * @property int $signed_by_id
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $medicaid_denial
 * @property-read mixed $created
 * @property-read mixed $deleted
 * @property-read mixed $updated
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AlternateContact> $alternateContacts
 * @property-read int|null $alternateContacts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ethnicity> $ethnicities
 * @property-read int|null $ethnicities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gender> $genders
 * @property-read int|null $genders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Household> $households
 * @property-read int|null $households_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Language> $languages
 * @property-read int|null $languages_count
 * @property-read \App\Models\LivingArrangement|null $living_arrangement
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MaritalStatus> $maritalStatuses
 * @property-read int|null $maritalStatuses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medicare> $medicares
 * @property-read int|null $medicares_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PhoneNumber> $phoneNumbers
 * @property-read int|null $phoneNumbers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Race> $races
 * @property-read int|null $races_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ApplicationStatusHistory> $status_histories
 * @property-read int|null $status_histories_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereApplicantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereHealthInsurancePremiums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereLanguageOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereLanguageServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereLivingArrangementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereMedicaidDenial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereMedicaidSpenddown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereOtherHealthCoverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereRaceOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereSignedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereSignedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NewApplication withoutTrashed()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\User|null $applicant
 * @property-read int|null $alternate_contacts_count
 * @property-read \App\Models\LivingArrangement|null $livingArrangement
 * @property-read int|null $marital_statuses_count
 * @property-read int|null $phone_numbers_count
 *
 * @mixin \Eloquent
 */
class NewApplication extends BaseModel
{
    use HasFactory;

    /*public function __construct(array $attributes = array())
    {
        $this->guard(array_merge($this->getGuarded(), ['address', 'phone']));
        parent::__construct($attributes);
    }*/

    protected $guarded = [
        'id', 'created_by_id', 'updated_by_id', 'deleted_by_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    // region Relationships

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function genders(): BelongsToMany
    {
        return $this->belongsToMany(Gender::class, 'application_genders', 'application_id', 'gender_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function races(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, 'application_races', 'application_id', 'race_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function ethnicities(): BelongsToMany
    {
        return $this->belongsToMany(Ethnicity::class, 'application_ethnicities', 'application_id', 'ethnicity_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'application_languages', 'application_id', 'language_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function maritalStatuses(): BelongsToMany
    {
        return $this->belongsToMany(MaritalStatus::class, 'application_marital_statuses', 'application_id', 'marital_status_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function files(): BelongsToMany
    {
        return $this->belongsToMany(File::class, 'application_files', 'application_id', 'file_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION)
            ->select([
                'id',
                'file_name',
                'file_type_id',
                'file_size',
                'content_type',
                'created_by_id',
                'updated_by_id',
                'deleted_by_id',
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }

    public function medicares(): BelongsToMany
    {
        return $this->belongsToMany(Medicare::class, 'application_medicares', 'application_id', 'medicare_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function livingArrangement(): BelongsTo
    {
        return $this->belongsTo(LivingArrangement::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'application_id', 'id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function households(): HasMany
    {
        return $this->hasMany(Household::class, 'application_id', 'id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function alternateContacts(): HasMany
    {
        return $this->hasMany(AlternateContact::class, 'application_id', 'id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(PhoneNumber::class, 'application_id', 'id')->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function status_histories(): HasMany
    {
        return $this->hasMany(ApplicationStatusHistory::class, 'application_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    // endregion
}
