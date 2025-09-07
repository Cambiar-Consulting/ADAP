<?php

namespace App\Models\Views;

use App\Models\Address;
use App\Models\AlternateContact;
use App\Models\ApplicationStatusHistory;
use App\Models\Ethnicity;
use App\Models\File;
use App\Models\Gender;
use App\Models\Household;
use App\Models\Language;
use App\Models\LivingArrangement;
use App\Models\Lookups\ApplicationStatusesLookup;
use App\Models\Lookups\ApplicationTypesLookup;
use App\Models\MaritalStatus;
use App\Models\Medicare;
use App\Models\PhoneNumber;
use App\Models\Race;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Views\Application
 *
 * @property int $application_id
 * @property int $applicant_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $alias
 * @property string|null $date_of_birth
 * @property string|null $ssn
 * @property string|null $email
 * @property string|null $race_other
 * @property string|null $language_other
 * @property int|null $language_services
 * @property int|null $other_health_coverage
 * @property int|null $health_insurance_premiums
 * @property string|null $medicaid_spenddown
 * @property string|null $medicaid_denial
 * @property string|null $livingArrangement
 * @property string|null $signed_at
 * @property int $signed_by_id
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $application_status_id
 * @property string|null $application_status
 * @property int|null $application_type_id
 * @property string|null $application_type
 * @property int|null $assigned_to_user_id
 * @property int|null $agency_id
 * @property int|null $alegal_representative_id
 *
 * @method static Builder|Application annualApplication()
 * @method static Builder|Application newApplication()
 * @method static Builder|Application sixMonthApplication()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ApplicationStatusHistory> $applicationStatusHistories
 * @property-read int|null $application_status_histories_count
 *
 * @method static Builder|Application closedStatus()
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application openStatus()
 * @method static Builder|Application query()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Gender> $genders
 * @property-read int|null $genders_count
 *
 * @method static Builder|Application latest()
 *
 * @property-read User|null $applicant
 * @property-read ApplicationStatusHistory|null $currentStatus
 *
 * @method static Builder|Application submitted()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ApplicationStatusHistory> $statusHistories
 * @property-read int|null $status_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, AlternateContact> $alternateContacts
 * @property-read int|null $alternate_contacts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Ethnicity> $ethnicities
 * @property-read int|null $ethnicities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, File> $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Language> $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, MaritalStatus> $maritalStatuses
 * @property-read int|null $marital_statuses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Medicare> $medicares
 * @property-read int|null $medicares_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, PhoneNumber> $phoneNumbers
 * @property-read int|null $phone_numbers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Household> $households
 * @property-read int|null $households_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Race> $races
 * @property-read int|null $races_count
 *
 * @mixin \Eloquent
 */
class Application extends Model
{
    protected $table = 'v_applications';

    // Scopes

    public function scopeNewApplication(Builder $query)
    {
        $query->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }

    public function scopeSixMonthApplication(Builder $query)
    {
        $query->where('application_type_id', ApplicationTypesLookup::SIXMONTH);
    }

    public function scopeAnnualApplication(Builder $query)
    {
        $query->where('application_type_id', ApplicationTypesLookup::ANNUAL);
    }

    public function scopeOpenStatus(Builder $query)
    {
        $query->whereIn('application_status_id', [ApplicationStatusesLookup::INPROGRESS, ApplicationStatusesLookup::MODIFICATIONREQUIRED]);
    }

    public function scopeClosedStatus(Builder $query)
    {
        $query->whereIn('application_status_id', [ApplicationStatusesLookup::APPROVED, ApplicationStatusesLookup::DENIED]);
    }

    public function scopeLatest(Builder $query)
    {
        $query->orderByDesc('application_id');
    }

    public function scopeSubmitted(Builder $query)
    {
        $query->whereIn('application_status_id', [ApplicationStatusesLookup::SUBMITTED, ApplicationStatusesLookup::MODIFICATIONSUBMITTED]);
    }

    // Relations

    public function currentStatus(): HasOne
    {
        return $this->hasOne(ApplicationStatusHistory::class, 'id', 'application_status_history_id');
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(ApplicationStatusHistory::class, 'application_id', 'application_id')->where('application_type_id', $this->application_type_id);
    }

    public function genders(): HasMany
    {
        return $this->hasMany(Gender::class)->where('application_type_id', $this->application_type_id);
    }

    public function races(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, 'application_races', 'application_id', 'race_id')
            ->where('application_type_id', $this->application_type_id);
    }

    public function ethnicities(): BelongsToMany
    {
        return $this->belongsToMany(Ethnicity::class, 'application_ethnicities', 'application_id', 'ethnicity_id')
            ->where('application_type_id', $this->application_type_id);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'application_languages', 'application_id', 'language_id')
            ->where('application_type_id', $this->application_type_id);
    }

    public function maritalStatuses(): BelongsToMany
    {
        return $this->belongsToMany(MaritalStatus::class, 'application_marital_statuses', 'application_id', 'marital_status_id')
            ->where('application_type_id', $this->application_type_id);
    }

    public function files(): BelongsToMany
    {
        return $this->belongsToMany(File::class, 'application_files', 'application_id', 'file_id')
            ->where('application_type_id', $this->application_type_id);
    }

    public function medicares(): BelongsToMany
    {
        return $this->belongsToMany(Medicare::class, 'application_medicares', 'application_id', 'medicare_id')
            ->where('application_type_id', $this->application_type_id);
    }

    public function livingArrangement(): BelongsTo
    {
        return $this->belongsTo(LivingArrangement::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'application_id', 'id')->where('application_type_id', $this->application_type_id);
    }

    public function households(): HasMany
    {
        return $this->hasMany(Household::class, 'application_id', 'id')->where('application_type_id', $this->application_type_id);
    }

    public function alternateContacts(): HasMany
    {
        return $this->hasMany(AlternateContact::class, 'application_id', 'id')->where('application_type_id', $this->application_type_id);
    }

    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(PhoneNumber::class, 'application_id', 'id')->where('application_type_id', $this->application_type_id);
    }
}
