<?php

namespace App\Http\Controllers;

use App\Http\Resources\DriverCollection;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(new DriverCollection(Driver::all()),Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $driver=Driver::create(
            $request->only(
                [
                    'image','name','city','phoneNo','gender','year_of_birth','contact_link','car_type','language','description'
                ]
            )
        );
        return new DriverResource($driver);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
