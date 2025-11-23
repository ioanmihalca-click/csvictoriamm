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
        Schema::table('canvas_posts', function (Blueprint $table) {
            // Statistics fields
            $table->unsignedBigInteger('views_count')->default(0)->after('published_at');
            $table->json('unique_views')->nullable()->after('views_count');
            $table->json('shares_count')->nullable()->after('unique_views');
            $table->integer('average_time_on_page')->nullable()->after('shares_count'); // in seconds
            $table->timestamp('last_viewed_at')->nullable()->after('average_time_on_page');
            $table->integer('reading_time')->nullable()->after('last_viewed_at'); // in minutes

            // Indexes for performance
            $table->index('views_count');
            $table->index('last_viewed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('canvas_posts', function (Blueprint $table) {
            // Drop indexes
            $table->dropIndex(['views_count']);
            $table->dropIndex(['last_viewed_at']);

            // Drop columns
            $table->dropColumn([
                'views_count',
                'unique_views',
                'shares_count',
                'average_time_on_page',
                'last_viewed_at',
                'reading_time',
            ]);
        });
    }
};
