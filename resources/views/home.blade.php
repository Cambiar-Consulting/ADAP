@extends('layouts.app')

@section('content')
<h2 class="text-center">ADAP Features</h2>

<div class="row">
    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Hosting and Security</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-shield-alt"></i></div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>Application would be self-hosted and you would retain complete control and ownership of all the data in the system.</li>
                    <li>We provide all the code updates to the system that will be deployed to your servers.</li>
                    <li>Deployable to Linux or Windows server environments</li>
                    <li>Deployable to virtual or cloud environments</li>
                    <li>Integration with Single Sign On Solution and OAuth</li>
                    <li>Regular updating of application with security fixes and new features</li>
                    <li>There are government cloud hosting options using <a href="https://azure.microsoft.com/en-us/global-infrastructure/government/" target="_blank">Azure Government</a> or <a href="https://aws.amazon.com/govcloud-us/?whats-new-ess.sort-by=item.additionalFields.postDateTime&whats-new-ess.sort-order=desc" target="_blank">Amazon AWS GovCloud</a> services.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Users</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-users"></i></div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li><strong>Applicants</strong> - users who submit their ADAP applications and renew every six months</li>
                    <li><strong>Legal Representatives</strong> - users who submit ADAP applications on behalf of applicants that they legally represent</li>
                    <li><strong>Case Managers</strong> - users at agencies that can create and submit applications on behalf of applicants that are in their agency</li>
                    <li><strong>Reviewers</strong> - ADAP staff that review applications, approve completed applications, follow-up with expiring applicants, etc</li>
                    <li><strong>Administrators</strong> - ADAP staff that manage administrative functions within the application and have all functionality of reviewers</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Integration</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-network-wired"></i></div>
                </div>
            </div>
            <div class="card-body">
                Can be integrated with:
                <ul>
                    <li>Pharmacy Benefits Manager</li>
                    <li>CAREWare</li>
                    <li>State recordkeeping programs like Medicaid, Death Notices, Master Person Index</li>
                    <li>Enterprise Service Bus</li>
                    <li>Mail merging for postal mail</li>
                    <li>Mobile text messaging</li>
                    <li>Additional programs such as: Dental Programs, Premium Assistance Programs, Insurance Assistance Programs</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Workflow</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-project-diagram"></i></div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>Ability to assist any applicant to help them submit or finish their ADAP application</li>
                    <li>Ability to send back applications for required modifications with history maintained</li>
                    <li>Real time updates for contact, residency, insurance, income, and other applicant changes</li>
                    <li>Ability to see application progress in real time</li>
                    <li>Pre-filled values on forms for faster submissions and renewals</li>
                    <li>Validation of data entered to insure data quality</li>
                    <li>Reminders for applicants and staff for follow-ups and renewals</li>
                    <li>Application assignments to ADAP staff and step by step processing</li>
                    <li>Round-robin application assignements with vacation mode settings</li>
                    <li>Duplicate user management</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Reports</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-book"></i></div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>Annual ADR reporting</li>
                    <li>Custom Reports</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Logging</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-archive"></i></div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>All actions logged for HIPPA compliance</li>
                    <li>User login history recorded</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection