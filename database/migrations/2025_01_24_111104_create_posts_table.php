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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users
            $table->string('title'); // Post title
            $table->longText('content'); // Post content
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->boolean('is_published')->default(false); // Published status
            $table->string('featured_image')->nullable(); // URL or path to featured image
            $table->text('excerpt')->nullable(); // Short summary of the post
            $table->json('tags')->nullable(); // Tags for the post (stored as JSON array)
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Foreign key to categories
            $table->integer('views_count')->default(0); // Number of views
            $table->json('seo_meta')->nullable(); // SEO metadata like title, description, keywords
            $table->timestamp('published_at')->nullable(); // Time of publishing
            $table->softDeletes(); // Adds a deleted_at column for soft deletes
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
