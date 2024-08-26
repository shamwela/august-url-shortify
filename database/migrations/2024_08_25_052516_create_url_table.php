<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('url', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4()->toString());
            $table->string('original_url')->nullable(false);
            $table->string('short_code')->nullable(false);
            $table->unsignedBigInteger('access_count')->default(0)->nullable(false);

            // Timestamps
            // Make sure to add timezones.
            $table->timestampsTz();
            $table->softDeletesTz('deleted_at');

            $table->unique(['original_url', 'short_code', 'deleted_at']);
            $table->index('short_code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('url');
    }
};
