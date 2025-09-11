<?php

namespace App\Models;

use App\Models\Lookups\ApplicationStatusesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApplicationStatus
 *
 * @property int $id
 * @property string|null $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationStatus whereName($value)
 *
 * @mixin \Eloquent
 */
class ApplicationStatus extends Model
{
    use HasFactory;

    public static function getAvailableNewApplicationStatuses($currentStatusId)
    {
        $statuses = ApplicationStatus::all();
        $availableStatuses = collect();

        switch ($currentStatusId) {
            case ApplicationStatusesLookup::INPROGRESS:
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::INPROGRESS));
                break;
            case ApplicationStatusesLookup::SUBMITTED:
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::SUBMITTED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::MODIFICATIONREQUIRED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::APPROVED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::DENIED));
                break;
            case ApplicationStatusesLookup::MODIFICATIONREQUIRED:
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::MODIFICATIONREQUIRED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::APPROVED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::DENIED));
                break;
            case ApplicationStatusesLookup::MODIFICATIONSUBMITTED:
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::MODIFICATIONSUBMITTED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::MODIFICATIONREQUIRED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::APPROVED));
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::DENIED));
                break;
            case ApplicationStatusesLookup::APPROVED:
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::APPROVED));
                break;
            case ApplicationStatusesLookup::DENIED:
                $availableStatuses->add($statuses->find(ApplicationStatusesLookup::DENIED));
                break;
        }

        return $availableStatuses;
    }
}
