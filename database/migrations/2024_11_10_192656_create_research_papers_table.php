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
	Schema::create('research_papers', function (Blueprint $table) {
	        $table->id();
	        $table->unsignedBigInteger('user_id');  // Assuming users are logged in
	        $table->string('title');
	        $table->text('description')->nullable();
	        $table->string('file_path');            // Path to the uploaded file
	        $table->timestamps();
	        
	        // Foreign key to reference users (optional)
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	 });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_papers');
    }
};
