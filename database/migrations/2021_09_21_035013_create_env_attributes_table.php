<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id, code, label, type, is_required, is_unique, note
        Schema::create('env_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('label')->nullable();
            $table->string('type')->nullable();
            $table->integer('is_required')->default(0);
            $table->integer('is_unique')->default(0);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('env_attributes');
    }
}
