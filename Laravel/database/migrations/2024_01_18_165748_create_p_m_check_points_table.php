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
        Schema::create('p_m_check_points', function (Blueprint $table) {
            $table->id();
            $table->string('p_m_check_list_id')->nullable();
            $table->string('title')->nullable();
            $table->string('std_value')->nullable(); 
            $table->string('actual_value')->nullable();
            $table->string('check_method')->nullable();
            $table->string('remark')->nullable();
            $table->string('media')->nullable();
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
        Schema::dropIfExists('p_m_check_points');
    }
};
