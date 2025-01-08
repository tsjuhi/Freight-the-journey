<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('job_title');
            $table->string('email');
            $table->string('company_name');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('country');
            $table->string('company_phone');
            $table->string('company_website');
            $table->string('business_type');
            $table->string('company_size');
            $table->string('other_business_type');
            $table->string('role_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
