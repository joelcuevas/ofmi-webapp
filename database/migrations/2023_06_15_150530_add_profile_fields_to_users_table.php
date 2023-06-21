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
            $table->tinyInteger('profile_complete')->default(0)->after('email');
            $table->date('birth_date')->nullable()->after('profile_complete');
            $table->string('pronoun')->default('')->after('birth_date');
            $table->string('display_name')->after('pronoun');
            $table->string('country')->default('MX')->after('display_name');
            $table->string('state')->default('')->after('country');
            $table->string('city')->nullable()->after('state');
            $table->string('street_and_number')->nullable()->after('city');
            $table->string('postal_code')->nullable()->after('street_and_number');
            $table->string('phone_number')->nullable()->after('postal_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profile_complete',
                'birth_date',
                'pronoun',
                'display_name',
                'country',
                'state',
                'city',
                'street_and_number',
                'postal_code',
                'phone_number',
            ]);
        });
    }
};
