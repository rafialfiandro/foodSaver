<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        if (Schema::hasTable($tableName)) {
            $foods = DB::table($tableName)->get(); // Fetch food items for the user
        } else {
            $foods = collect(); // Return an empty collection if the table doesn't exist
        }

        return view('dashboard', compact('foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userId = auth()->id();
        $tableName = "user_{$userId}_foods";

        if (Schema::hasTable($tableName)) {
            DB::table($tableName)->insert([
                'name' => $request->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('dashboard')->with('success', 'Food added successfully!');
        }

        return redirect()->route('dashboard')->withErrors('Food table not found for this user.');
    }
}
