<?php

namespace App\Policies;

use App\Models\Lookups\ApplicationStatusesLookup;
use App\Models\NewApplication;
use App\Models\User;
use App\Models\Views\Application;

class NewApplicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NewApplication $newApplication): bool
    {
        if ($newApplication != null) {
            if ($user->isAdmin() || $user->isSuperUser() || $user->isReviewer()) {
                return true;
            }

            // if an applicant or assiting an applicant
            if ($user->isApplicant() || $user->isAssisting()) {
                $applicantId = $user->getApplicantId();

                if ($applicantId != null) {
                    // applicantId must match the person editing or the id of the applicant they are assisting
                    if ($newApplication->applicant_id == $applicantId) {
                        return true;
                    }

                }
            }

            if ($user->isCaseManager()) {
                // Case Managers can view applications of applicants at their agency
                $agencyId = $user->agency_id;

                if ($agencyId != null && $newApplication->applicant->agency_id == $agencyId) {
                    return true;
                }
            }

            if ($user->isLegalRepresentative()) {
                // Legal Representatives can view applications with their legal rep id
                if ($newApplication->applicant->legal_representative_id == $user->id) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // must be an applicant or assisting an applicant
        if ($user->isApplicant() || $user->isAssisting()) {
            // applicant has no new applications
            $latestNewApplication = Application::newApplication()->where('applicant_id', $user->id)->latest()->first();
            if ($latestNewApplication == null) {
                return true;
            }
            // If their latest New Application is Denied, then they can submit another one to try and get approved again
            if ($latestNewApplication->application_status_id == ApplicationStatusesLookup::DENIED) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NewApplication $newApplication): bool
    {
        $applicantId = $user->getApplicantId();

        // must be an applicant or assisting an applicant
        if ($applicantId != null) {
            // must have a New Application
            if ($newApplication != null) {
                // applicantId must match the person editing or the id of the applicant they are assisting
                if ($newApplication->applicant_id == $applicantId) {
                    // application must be In Progress or Mod Required
                    $currentStatus = $newApplication->status_histories()->latest()->first();

                    return $currentStatus->application_status_id == ApplicationStatusesLookup::INPROGRESS
                        || $currentStatus->application_status_id == ApplicationStatusesLookup::MODIFICATIONREQUIRED;
                }
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NewApplication $newApplication): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NewApplication $newApplication): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NewApplication $newApplication): bool
    {
        return false;
    }

    public function review(User $user, NewApplication $newApplication): bool
    {
        if ($newApplication == null) {
            return false;
        }
        if ($newApplication->application_status_id == ApplicationStatusesLookup::ARCHIVED) {
            return false;
        }

        return $user->isAdmin() || $user->isSuperUser() || $user->isReviewer();
    }
}
