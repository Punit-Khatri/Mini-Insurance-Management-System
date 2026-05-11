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
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('customer')->after('password');
            }

            if (! Schema::hasColumn('users', 'contact_number')) {
                $table->string('contact_number')->nullable()->after('role');
            }

            if (! Schema::hasColumn('users', 'policy_id')) {
                $table->unsignedBigInteger('policy_id')->nullable()->after('contact_number');
                $table->foreign('policy_id')->references('id')->on('policies')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users', 'contact_number')) {
                $table->dropColumn('contact_number');
            }
            if (Schema::hasColumn('users', 'policy_id')) {
                $table->dropForeign(['policy_id']);
                $table->dropColumn('policy_id');
            }
        });
    }
};
