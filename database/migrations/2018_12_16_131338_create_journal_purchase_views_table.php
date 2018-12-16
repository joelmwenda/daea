<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalPurchaseViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW journal_purchase_view AS
        (
          SELECT r.*, d.user_id, d.deduction_amount, u.name, u.email, u.user_type_id, j.journal, j.journal_details, j.journal_path, j.download_name, j.member_price, j.nonmember_price

          FROM journal_purchases r
            JOIN deductions d ON d.id=r.deduction_id
            JOIN users u ON u.id=d.user_id
            JOIN journals j ON j.id=r.journal_id

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
        // Schema::dropIfExists('journal_purchase_views');
    }
}
