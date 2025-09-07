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
        CREATE VIEW v_users_with_roles AS
        SELECT
             u.id AS `user_id` 
            ,u.first_name
            ,u.middle_name
            ,u.last_name
            ,u.username
            ,u.email
            ,u.phone_number
            ,u.alias
            ,u.date_of_birth
            ,u.ssn
            ,u.agency_id
            ,u.legal_representative_id
            ,u.last_assignment_date
            ,u.is_stub
            ,u.last_login
            ,u.created_by_id
            ,u.updated_by_id
            ,u.deleted_by_id
            ,u.created_at
            ,u.updated_at
            ,u.deleted_at
            ,r.id AS `role_id`
            ,r.`name` AS `role_name`
        FROM users AS u
        LEFT JOIN role_user AS ru ON ru.user_id = u.id
        LEFT JOIN roles AS r ON r.id = ru.role_id
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
        DB::statement('DROP VIEW IF EXISTS v_users_with_roles');
    }
};
