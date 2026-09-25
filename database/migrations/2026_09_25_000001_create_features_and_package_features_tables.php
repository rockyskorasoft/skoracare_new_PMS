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
        if (!Schema::hasTable('features')) {
            Schema::create('features', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('package_features')) {
            Schema::create('package_features', function (Blueprint $table) {
                $table->id();
                $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
                $table->foreignId('feature_id')->constrained('features')->onDelete('cascade');
                $table->integer('sort_order')->default(0);
                $table->timestamps();

                $table->unique(['package_id', 'feature_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_features');
        Schema::dropIfExists('features');
    }
};
