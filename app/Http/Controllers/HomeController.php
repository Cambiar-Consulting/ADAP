<?php

namespace App\Http\Controllers;

use App\Models\Lookups\ApplicationStatusesLookup;
use App\Models\NewApplication;
use App\Models\Views\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        /*
        session()->flash('success', 'Success Message');
        session()->flash('error', 'Error Message');
        session()->flash('info', 'Info Message');
        session()->flash('warning', 'Warning Message');
        $messageBag = new \Illuminate\Support\MessageBag(['message 1','message2', 'message 3']);
        session()->flash('errors', $messageBag);
        */

        if (Auth::check()) {
            if (Auth::user()->isApplicant() || Auth::user()->isAssisting()) {
                return $this->getApplicantHomepage();
            } elseif (Auth::user()->isSuperUser() || Auth::user()->isAdmin() || Auth::user()->isReviewer()) {
                return $this->getReviewerHomepage();
            } elseif (Auth::user()->isCaseManager()) {
                return $this->getCaseManagerHomepage();
            } elseif (Auth::user()->isLegalRepresentative()) {
                return $this->getLegalRepHomepage();
            }
        }

        return view('home');
    }

    private function getApplicantHomepage()
    {
        $applicant = Auth::user()->getApplicant();
        $submittedNewApplications = $applicant->applications()->newApplication()->submitted()->get();
        $closedNewApplications = $applicant->applications()->newApplication()->closedStatus()->get();
        $latestNewApplication = $applicant->applications()->newApplication()->latest()->first();
        $coverageStartDate = null;
        $coverageEndDate = null;
        $openNewApplication = null;

        if ($latestNewApplication != null && $latestNewApplication->application_status_id == ApplicationStatusesLookup::APPROVED) {
            $coverageStartDate = $latestNewApplication->currentStatus->start_date;
            $coverageEndDate = $latestNewApplication->currentStatus->end_date;
        }

        if (Gate::denies('create', NewApplication::class)) {
            $openNewApplication = $applicant->applications()->newApplication()->openStatus()->first();
        }

        return view('home.applicant', compact(
            'applicant',
            'submittedNewApplications',
            'closedNewApplications',
            'latestNewApplication',
            'openNewApplication',
            'coverageStartDate',
            'coverageEndDate'
        ));
    }

    private function getReviewerHomepage()
    {
        $applications = Application::all();

        return view('home.admin', compact('applications'));
    }

    private function getCaseManagerHomepage()
    {
        return view('home');
    }

    private function getLegalRepHomepage()
    {
        return view('home');
    }
}
