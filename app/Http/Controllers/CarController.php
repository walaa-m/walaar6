<?php

// app/Http/Controllers/CarController.php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'published' => 'sometimes|boolean',
        ]);

        Car::create([
            'car_title' => $validatedData['car_title'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'published' => $request->input('published', false) ? true : false,
        ]);

        return redirect()->back()->with('success', 'Car added successfully');
    }
    public function index()
    {
        $cars = Car::all(); // Fetch all cars from the database
        return view('all_cars', compact('cars')); // Pass the cars data to the 'all_cars' view
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id); // Fetch the car by its ID
        return view('edit_car', compact('car')); // Pass the car data to the edit view
    }

    // Handle the update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'car_title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'published' => 'sometimes|boolean',
        ]);

        $car = Car::findOrFail($id); // Find the car by its ID
        $car->update([
            'car_title' => $validatedData['car_title'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'published' => $request->input('published', false) ? true : false,
        ]);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

}