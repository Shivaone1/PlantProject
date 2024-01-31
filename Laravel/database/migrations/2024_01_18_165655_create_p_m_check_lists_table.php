<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_m_check_lists', function (Blueprint $table) {
            $table->id();
            $table->string('plant_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('subsection_id')->nullable(); 
            $table->string('equipment_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('description')->nullable();
            $table->string('equipment')->nullable();
            $table->string('version')->nullable();
            $table->string('checksheettype')->nullable();
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
        Schema::dropIfExists('p_m_check_lists');
    }
};
