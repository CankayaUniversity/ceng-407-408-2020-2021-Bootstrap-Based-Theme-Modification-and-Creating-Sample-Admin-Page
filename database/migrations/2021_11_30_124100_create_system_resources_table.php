<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_resources', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('server_id')->constrained()->onDelete('cascade');
            $table->float('cpu');
            $table->float('memory');
            $table->float('disk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_resources');
    }
}
