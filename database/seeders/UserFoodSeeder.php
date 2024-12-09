<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 1; // Target user ID
        $tableName = "user_{$userId}_foods"; // User-specific table name

        // Check if the table exists, and create it if not
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function ($table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        // Insert food items into the user's table
        DB::table($tableName)->insert([
            ['name' => 'Apple', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Banana', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Carrot', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
