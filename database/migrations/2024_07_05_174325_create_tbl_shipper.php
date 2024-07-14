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
        Schema::create('tbl_shipper', function (Blueprint $table) {
            $table->Increments('shipper_id');
            $table->string('shipper_email',100);
            $table->string('shipper_password');
            $table->string('shipper_name');
            $table->string('shipper_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_shipper');
    }
};
