<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->required(); 
            $table->string('last_name')->required(); 
            
            //$table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreignID('company_id')->constrained()->cascadeOnDelete();
            //$table->foreignID('company_id'); //original

            $table->string('email')->unique();
            $table->string('phone')->unique();
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
        Schema::dropIfExists('employees');
    }
}
