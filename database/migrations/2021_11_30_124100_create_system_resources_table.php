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

            $table->foreignId('server_id')->nullable()->constrained()->onDelete('cascade');

            $table->float('cpu')->nullable();
            $table->integer('cpu_count')->nullable();

            $table->float('load_avg')->nullable();

            $table->float('vmem')->nullable();
            $table->bigInteger('vmem_total')->nullable();
            $table->bigInteger('vmem_available')->nullable();
            $table->bigInteger('vmem_used')->nullable();
            $table->bigInteger('vmem_free')->nullable();
            $table->bigInteger('vmem_active')->nullable();
            $table->bigInteger('vmem_inactive')->nullable();
            $table->bigInteger('vmem_buffers')->nullable();
            $table->bigInteger('vmem_cached')->nullable();
            $table->bigInteger('vmem_shared')->nullable();

            $table->float('swap_mem')->nullable();
            $table->bigInteger('swap_mem_total')->nullable();
            $table->bigInteger('swap_mem_used')->nullable();
            $table->bigInteger('swap_mem_free')->nullable();
            $table->bigInteger('swap_mem_sin')->nullable();
            $table->bigInteger('swap_mem_sout')->nullable();

            $table->float('disk')->nullable();
            $table->bigInteger('disk_total')->nullable();
            $table->bigInteger('disk_used')->nullable();
            $table->bigInteger('disk_free')->nullable();
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
