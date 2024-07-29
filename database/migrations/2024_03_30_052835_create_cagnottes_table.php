<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCagnottesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cagnottes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('amount', 10, 2);
            $table->string('photo')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('category_id')->references('id')->on('crud_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cagnottes');
    }
}
