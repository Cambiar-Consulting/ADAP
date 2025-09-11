<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Lookups\RolesLookup;
use App\Models\Views\Application;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $username
 * @property mixed|null $password
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $alias
 * @property string|null $date_of_birth
 * @property string|null $ssn
 * @property int|null $agency_id
 * @property int|null $legal_representative_id
 * @property string|null $last_assignment_date
 * @property int $is_stub
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $last_login
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $full_name
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read mixed $created
 * @property-read mixed $deleted
 * @property-read mixed $updated
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NewApplication> $newApplications
 * @property-read int|null $new_applications_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $updatedBy
 *
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsStub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastAssignmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLegalRepresentativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Application> $applications
 * @property-read int|null $applications_count
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [
        'id', 'password', 'agency_id', 'legal_representative_id', 'last_assignment_date', 'is_stub', 'email_verified_at',
        'last_login', 'created_by_id', 'updated_by_id', 'deleted_by_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'date_of_birth' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name.' '.$this->last_name
        );
    }

    // region Relationships

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'applicant_id', 'id');
    }

    public function mergedApplication(): HasOne
    {
        return $this->hasOne(MergedApplication::class, 'applicant_id', 'id');
    }

    // endregion

    // region Role Checks
    public function isAdmin()
    {
        return $this->roles()->where('id', RolesLookup::ADMINISTRATOR)->exists();
    }

    public function isSuperUser()
    {
        return $this->roles()->where('id', RolesLookup::SUPERUSER)->exists();
    }

    public function isApplicant()
    {
        return $this->roles()->where('id', RolesLookup::APPLICANT)->exists();
    }

    public function isReviewer()
    {
        return $this->roles()->where('id', RolesLookup::REVIEWER)->exists();
    }

    public function isLegalRepresentative()
    {
        return $this->roles()->where('id', RolesLookup::LEGALREPRESENTATIVE)->exists();
    }

    public function isReadOnly()
    {
        return $this->roles()->where('id', RolesLookup::READONLY)->exists();
    }

    public function isCaseManager()
    {
        return $this->roles()->where('id', RolesLookup::CASEMANAGER)->exists();
    }

    // endregion

    // region Assisting Functions
    public function getApplicantId()
    {
        if ($this->isApplicant()) {
            return Auth::user()->id;
        }

        if ($this->isAssisting()) {
            $applicant = $this->getAssisting();
            if ($applicant != null) {
                return $applicant->id;
            }
        }

        return null;
    }

    public function setAssisting($applicant_id)
    {
        $user = User::find($applicant_id);
        if ($user != null && $user->isApplicant()) {
            session([
                'is_assisting' => 1,
                'assisted_applicant_id' => $user->id,
                'assisted_first_name' => $user->first_name,
                'assisted_last_name' => $user->last_name,
            ]);
        }
    }

    public function getApplicant()
    {
        if ($this->isApplicant()) {
            return $this;
        }

        if ($this->isAssisting()) {
            return User::find(session()->get('assisting_id'));
        }

        return null;
    }

    public function endAssisting()
    {
        session()->forget(['is_assisting', 'assisted_applicant_id', 'assisted_first_name', 'assisted_last_name']);
    }

    public function isAssisting()
    {
        return session()->get('is_assisting') == 1;
    }

    // endregion

    // region Other Functions

    public function isAvailable()
    {
        $unAvailability = Availability::where('user_id', $this->id)
            ->where('unavailable_start', '<=', Carbon::now())
            ->where('unavailable_end', '>=', Carbon::now())
            ->get();

        if ($unAvailability->any()) {
            return false;
        }

        return true;
    }

    // endregion
}
