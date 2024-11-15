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
    	Schema::create('processed_papers', function (Blueprint $table) {
        	$table->id();
        	$table->foreignId('research_paper_id')->constrained()->onDelete('cascade');
        	$table->text('extracted_text');
        	$table->timestamps();
    	});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processed_papers');
    }
};
