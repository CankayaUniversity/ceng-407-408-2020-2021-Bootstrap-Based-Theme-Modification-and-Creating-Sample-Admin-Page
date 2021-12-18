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

            $table->float('cpu_percent');
            $table->integer('cpu_count');

            $table->float('load_avg');

            $table->bigInteger('vmem_total');
            $table->bigInteger('vmem_available');
            $table->float('vmem_percent');
            $table->bigInteger('vmem_used');
            $table->bigInteger('vmem_free');
            $table->bigInteger('vmem_inactive');
            $table->bigInteger('vmem_buffers');
            $table->bigInteger('vmem_cached');
            $table->bigInteger('vmem_shared');

            $table->bigInteger('swap_mem_total');
            $table->bigInteger('swap_mem_used');
            $table->bigInteger('swap_mem_free');
            $table->float('swap_mem_percent');
            $table->bigInteger('swap_mem_sin');
            $table->bigInteger('swap_mem_sout');

            $table->bigInteger('disk_total');
            $table->bigInteger('disk_used');
            $table->bigInteger('disk_free');
            $table->float('disk_percent');
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
