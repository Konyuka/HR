<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('salary_for')->index();
            $table->double('gross_pay', 12, 2);
            $table->double('commission', 12, 2)->nullable();
            $table->double('leave_allowance', 12, 2)->nullable();
            $table->double('total_pay', 12, 2)->nullable();
            $table->double('paye', 12, 2)->nullable();
            $table->double('nhif', 12, 2)->nullable();
            $table->double('nssf', 12, 2)->nullable();
            $table->double('helb', 12, 2)->nullable();
            $table->double('insurance', 12, 2)->nullable();
            $table->double('lost_hours', 12, 2)->nullable();
            $table->double('sacco', 12, 2)->nullable();
            $table->double('recovery', 12, 2)->nullable();
            $table->double('arrears', 12, 2)->nullable();
            $table->double('total_deductions', 12, 2)->nullable();
            $table->double('net_amount', 12, 2)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
