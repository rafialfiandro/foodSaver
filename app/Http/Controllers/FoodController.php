<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FoodController extends Controller
{
    // Display food items for the user
    public function index()
    {
        $userId = auth()->id(); // Get the currently authenticated user ID
        $tableName = "user_{$userId}_foods"; // User-specific table name

        if (Schema::hasTable($tableName)) {
            $foods = DB::table($tableName)->get(); // Fetch food items
            return view('foods.index', compact('foods'));
        }

        return view('foods.index')->withErrors('No food table found for this user.');
    }

    // Add a new food item
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        if (Schema::hasTable($tableName)) {
            DB::table($tableName)->insert([
                'name' => $request->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('foods.index')->with('success', 'Food added successfully!');
        }

        return redirect()->route('foods.index')->withErrors('No food table found for this user.');
    }
}
