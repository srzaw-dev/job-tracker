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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('company_name');
            $table->string('role');
            $table->string('location')->nullable();
            $table->text('job_posting')->nullable();
            $table->enum('status', ['applied', 'in_review', 'interview', 'offer', 'rejected', 'ghosted'])->default('applied');
            $table->boolean('is_open')->default(true);
            $table->date('date_applied');
            $table->jsonb('notes')->nullable();
            $table->jsonb('contacts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
