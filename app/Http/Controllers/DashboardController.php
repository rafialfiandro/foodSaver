<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        $foods = Schema::hasTable($tableName)
            ? DB::table($tableName)->paginate(7) // Paginate items by 10
            : collect(); // Return empty collection if table doesn't exist

        return view('dashboard', compact('foods'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userId = auth()->id(); // Get the logged-in user's ID
        $tableName = "user_{$userId}_foods"; // Define the table name dynamically

        // Check if the table exists
        if (!Schema::hasTable($tableName)) {
            // Create the table if it does not exist
            Schema::create($tableName, function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        // Insert the food item into the table
        DB::table($tableName)->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Food added successfully!');
    }

    public function edit($id)
    {
        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        if (Schema::hasTable($tableName)) {
            $food = DB::table($tableName)->find($id);
            return view('foods.edit', compact('food'));
        }

        return redirect()->route('dashboard')->withErrors('Food not found.');
    }

    // Update a food item
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        if (Schema::hasTable($tableName)) {
            DB::table($tableName)->where('id', $id)->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Food updated successfully!');
    }

    // Delete a food item
    public function destroy($id)
    {
        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        if (Schema::hasTable($tableName)) {
            DB::table($tableName)->where('id', $id)->delete();
        }

        return redirect()->route('dashboard')->with('success', 'Food deleted successfully!');
    }
}
