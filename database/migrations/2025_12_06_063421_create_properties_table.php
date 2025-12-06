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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('property_title');

            $table->text('property_description');

            $table->text('property_address');

            $table->string('property_area');

            $table->foreignId('property_type_id')
                ->constrained('property_types')
                ->onDelete('restrict');

            $table->foreignId('option_type_id')
                ->constrained('option_types')
                ->onDelete('restrict');

            $table->decimal('rate', 10, 2);

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('restrict');

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('restrict');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
