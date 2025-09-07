<?php

namespace App\Models;

use App\Models\Views\UserWithRole;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\ApplicationStatusHistory
 *
 * @property int $id
 * @property int $application_id
 * @property int $application_status_id
 * @property int $application_type_id
 * @property int|null $assigned_to_user_id
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property string|null $notes
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $created
 * @property-read mixed $deleted
 * @property-read mixed $updated
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Database\Factories\ApplicationStatusHistoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereApplicationStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereApplicationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereAssignedToUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatusHistory withoutTrashed()
 *
 * @property-read \App\Models\User|null $assignedTo
 *
 * @method static Builder|ApplicationStatusHistory latest()
 *
 * @mixin \Eloquent
 */
class ApplicationStatusHistory extends BaseModel
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_by_id', 'updated_by_id', 'deleted_by_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function assigned_to(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'assigned_to_user_id');
    }

    public function application_status(): HasOne
    {
        return $this->hasOne(ApplicationStatus::class, 'id', 'application_status_id');
    }

    public function scopeLatest(Builder $query)
    {
        $query->orderByDesc('id');
    }

    public function start_date()
    {
        return $this->start_date ? $this->start_date->format('m/d/Y') : null;
    }

    public function end_date()
    {
        return $this->end_date ? $this->end_date->format('m/d/Y') : null;
    }

    public static function getAssignedUserForApplication($applicationId, $applicationTypeId)
    {
        // first see if there was a reviewer already on this newApplication
        // we want to keep an application with a previous reviewer if possible
        $statusHistory = ApplicationStatusHistory::with('assignedTo')
            ->where('application_id', $applicationId)
            ->where('application_type_id', $applicationTypeId)
            ->whereNotNull('assigned_to_user_id')
            ->orderByDesc('id')
            ->first();

        $lastAssignedReviewer = null;
        if ($statusHistory != null) {
            $lastAssignedReviewer = $statusHistory->assignedTo;
        }

        // check they exist and not deactivated
        if ($lastAssignedReviewer != null && $lastAssignedReviewer->deleted_at == null) {
            // then check if that person is still a reviewer
            if ($lastAssignedReviewer->isReviewer()) {
                // then check they are still available
                if ($lastAssignedReviewer->isAvailable()) {
                    return $lastAssignedReviewer;
                } else {
                    // get their backup?
                }
            }
        }

        // otherwise round robin to the next reviewer
        $lastAssigned = UserWithRole::reviewers()
            // where is available
            ->orderBy('last_assignment_date')
            ->first();

        return $lastAssigned;
    }
}
