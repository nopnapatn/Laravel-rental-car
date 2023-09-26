<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function home()
    {
        $rentals = Rental::get();
        $cars = Car::where('id', '==', '0');
        if (Gate::allows('isAdmin', auth()->user())) {
            return view('admin.index', [
                'rentals' => $rentals
            ]);
        } else {
            return view('home', [
                'cars' => $cars
            ]);
        }
    }

    public function filter(Request $request)
    {
        $start_at_date_filter = $request->start_at_date;
        $end_at_date_filter = $request->end_at_date;
        $start_at_time_filter = $request->start_at_time;
        $end_at_time_filter = $request->end_at_time;

        // Retrieve the cars that do not have rentals that overlap with the conditions
        $cars = Car::whereDoesntHave('rented', function ($query) use ($start_at_date_filter, $end_at_date_filter, $start_at_time_filter, $end_at_time_filter) {
            $query->where(function ($subquery) use ($start_at_date_filter, $end_at_date_filter, $start_at_time_filter, $end_at_time_filter) {
                $subquery->where(function ($innerSubquery) use ($start_at_date_filter, $end_at_date_filter, $start_at_time_filter, $end_at_time_filter) {
                    $innerSubquery->where('start_at_date', '<=', $end_at_date_filter)
                        ->where('end_at_date', '>=', $start_at_date_filter);
                })->orWhere(function ($innerSubquery) use ($end_at_date_filter, $end_at_time_filter) {
                    $innerSubquery->where('start_at_date', '=', $end_at_date_filter)
                        ->where('start_at_time', '<=', $end_at_time_filter);
                })->orWhere(function ($innerSubquery) use ($start_at_date_filter, $start_at_time_filter,) {
                    $innerSubquery->where('end_at_date', '=', $start_at_date_filter)
                        ->where('end_at_time', '>=', $start_at_time_filter);
                });
            });
        })->get();

        return view('home', [
            'cars' => $cars,
            'start_at_date_filter' => $start_at_date_filter,
            'end_at_date_filter' => $end_at_date_filter,
            'start_at_time_filter' => $start_at_time_filter,
            'end_at_time_filter' => $end_at_time_filter,
        ]);
    }
}
