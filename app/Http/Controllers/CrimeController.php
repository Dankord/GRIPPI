<?php

namespace App\Http\Controllers;
use App\Models\Crime;

use Illuminate\Http\Request;
use App\Http\Requests\Crime\StoreCrimeRequest;
use Illuminate\Support\Facades\DB;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crimes = Crime::latest()->paginate(10);

        return response()->json($crimes); //im not really sure how i'll return data to the frontend just correct me if im wrong, but i used json response here
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
    public function store(StoreCrimeRequest $request)
    {
        $validated = $request->validated();

        $validated['station_id'] = $request->user()->station_id;
        $validated['reported_by_id'] = $request->user()->id;
        $validated['reported_at'] = now();

        $latitude = $validated['latitude'];
        $longitude = $validated['longitude'];

        $validated['location'] = DB::raw(
            "ST_SetSRID(
                ST_MakePoint($longitude, $latitude),
                4326
            )"
        );
        // remove the temp coordinate data
        unset($validated['latitude'], $validated['longitude']);

        //yo future me add uhh address, location, location is uhh geometry apparently xD idk where to get that doe ask kerv - Yeah bro Im doing it
        Crime::create($validated);

        return redirect()
            ->route('encoder.dashboard')
            ->with('success', 'Crime report submitted successfully!');
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
}
