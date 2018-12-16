<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccasionRegistrationViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW occasion_registration_view AS
        (
          SELECT r.*, d.user_id, d.deduction_amount, u.name, u.email, u.user_type_id, o.occasion, o.occasion_details, o.registration_deadline, o.occasion_date, o.member_price, o.nonmember_price

          FROM occasion_registrations r
            JOIN deductions d ON d.id=r.deduction_id
            JOIN users u ON u.id=d.user_id
            JOIN occasions o ON o.id=r.occasion_id

        );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('occasion_registration_views');
    }
}
