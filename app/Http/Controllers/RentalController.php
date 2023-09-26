<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(auth()->id());
        $rentals = $user->renter()->get();

        return view('rentals.index', [
            'user' => Auth::user(),
            'rentals' => $rentals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Car $car, $start_at_date_filter, $end_at_date_filter, $start_at_time_filter, $end_at_time_filter)
    {
        $driver = Driver::find($car->id);

        return view('rentals.create', [
            'car' => $car,
            'driver' => $driver,
            'start_at_date_filter' => $start_at_date_filter,
            'end_at_date_filter' => $end_at_date_filter,
            'start_at_time_filter' => $start_at_time_filter,
            'end_at_time_filter' => $end_at_time_filter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Car $car, Driver $driver, $start_at_date_filter, $end_at_date_filter, $start_at_time_filter, $end_at_time_filter)
    {
        $user = Auth::user();
        $rental = new Rental();
        $rental->renter_id = auth()->id();
        $rental->car_id = $car->id;
        $rental->driver_id = $driver->id;
        $rental->start_at_province = $request->start_at_province;
        $rental->end_at_province = $request->end_at_province;
        $rental->start_at_date = $start_at_date_filter;
        $rental->end_at_date = $end_at_date_filter;
        $rental->start_at_time = $start_at_time_filter;
        $rental->end_at_time = $end_at_time_filter;
        $rental->name = $request->name;
        $rental->phone_number = $user->phone_number;
        $rental->email = $request->email;
        $rental->car_title = $car->title;
        $rental->car_image_path = $car->image_path;
        $rental->save();

        return redirect()->route('rentals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        return view('rentals.show', [
            'rental' => $rental
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
