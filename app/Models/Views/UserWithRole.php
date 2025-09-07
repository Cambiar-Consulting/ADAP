<?php

namespace App\Models\Views;

use App\Models\Lookups\RolesLookup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserWithRole
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserWithRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWithRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWithRole query()
 * @method static Builder|UserWithRole admins()
 * @method static Builder|UserWithRole applicants()
 * @method static Builder|UserWithRole caseManagers()
 * @method static Builder|UserWithRole legalReps()
 * @method static Builder|UserWithRole readOnly()
 * @method static Builder|UserWithRole reviewers()
 * @method static Builder|UserWithRole superUsers()
 *
 * @mixin \Eloquent
 */
class UserWithRole extends Model
{
    protected $table = 'v_users_with_roles';

    // region Scopes

    public function scopeApplicants(Builder $query): void
    {
        $query->where('role_id', RolesLookup::APPLICANT);
    }

    public function scopeAdmins(Builder $query): void
    {
        $query->where('role_id', RolesLookup::ADMINISTRATOR);
    }

    public function scopeCaseManagers(Builder $query): void
    {
        $query->where('role_id', RolesLookup::CASEMANAGER);
    }

    public function scopeLegalReps(Builder $query): void
    {
        $query->where('role_id', RolesLookup::LEGALREPRESENTATIVE);
    }

    public function scopeReadOnly(Builder $query): void
    {
        $query->where('role_id', RolesLookup::READONLY);
    }

    public function scopeReviewers(Builder $query): void
    {
        $query->where('role_id', RolesLookup::REVIEWER);
    }

    public function scopeSuperUsers(Builder $query): void
    {
        $query->where('role_id', RolesLookup::SUPERUSER);
    }
    // enregion
}
