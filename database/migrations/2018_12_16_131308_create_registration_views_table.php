<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW registration_view AS
        (
          SELECT r.*, d.user_id, d.deduction_amount, u.name, u.email, u.user_type_id

          FROM registrations r
            JOIN deductions d ON d.id=r.deduction_id
            JOIN users u ON u.id=d.user_id

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
        // Schema::dropIfExists('registration_views');
    }
}
