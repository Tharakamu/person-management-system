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
        Schema::create('people', function (Blueprint $table) {

            $table->id();

            $table->string('full_name');
            $table->integer('age')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->text('address')->nullable();

            $table->string('contact_no_1', 20);
            $table->string('contact_no_2', 20)->nullable();

            $table->string('district');
            $table->string('ds_division');
            $table->string('gn_division');
            $table->string('gs_wasam');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};