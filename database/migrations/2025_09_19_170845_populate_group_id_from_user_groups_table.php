<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            UPDATE users u
            SET group_id = (
                SELECT group_id
                FROM user_groups ug
                WHERE ug.user_id = u.id
                LIMIT 1
            )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->update(['group_id' => null]);
    }
};
