<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<'EOD'
        CREATE VIEW v_applications AS
        WITH latest_status AS (
            SELECT
                MAX(h.id) AS `application_status_history_id`
                ,h.application_id
                ,h.application_type_id
            FROM application_status_histories AS h
            GROUP BY h.application_id, h.application_type_id
        )
        SELECT
             a.id AS `application_id`
            ,a.applicant_id
            ,a.first_name
            ,a.middle_name
            ,a.last_name
            ,a.alias
            ,a.date_of_birth
            ,a.ssn
            ,a.email
            ,a.race_other
            ,a.language_other
            ,a.language_services
            ,a.other_health_coverage
            ,a.health_insurance_premiums
            ,a.medicaid_spenddown
            ,a.medicaid_denial
            ,a.living_arrangement_id
            ,a.signed_at
            ,a.signed_by_id
            ,a.created_by_id
            ,a.updated_by_id
            ,a.deleted_by_id
            ,a.created_at
            ,a.updated_at
            ,a.deleted_at
            ,s.id AS `application_status_id`
            ,s.`name` AS `application_status`
            ,t.id AS `application_type_id`
            ,t.`name` AS `application_type`
            ,ls.application_status_history_id
            ,sh.assigned_to_user_id AS `assigned_to_user_id`
            ,u.agency_id AS `agency_id`
            ,u.legal_representative_id AS `legal_representative_id`
        FROM latest_status AS `ls`
        LEFT JOIN application_status_histories sh ON sh.id = ls.application_status_history_id
        LEFT JOIN new_applications a ON a.id = sh.application_id AND sh.application_type_id = a.application_type_id
        LEFT JOIN application_statuses s ON s.id = sh.application_status_id
        LEFT JOIN application_types t ON t.id = sh.application_type_id
        LEFT JOIN users u ON u.id = a.applicant_id
        EOD;

        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_applications');
    }
};
