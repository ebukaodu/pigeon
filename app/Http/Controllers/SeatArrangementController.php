<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Admin;
use App\Bus;
use App\Coach;
use App\CoachDepartureTime;
use App\CoachType;
use App\Company;
use App\Counter;
use App\Fare;
use App\CoachZone;
use App\Seat;
use App\SeatArrangement;
use App\SeatType;
use App\User;
use App\Route;
use App\Zone;

use Carbon\Carbon;

class SeatArrangementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seat_arrangements = SeatArrangement::paginate(20);
        $serial = 1;

        return view('seat_arrangement.index', compact('seat_arrangements', 'serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seats = Seat::all();
        $seat_types = SeatType::all();
        return view('seat_arrangement.create',compact('seats', 'seat_types'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        for($i = 0 ; $i < count($request->row) ; $i++)
        {
            $seat_arrangement = new SeatArrangement;
            $seat_arrangement->seat_id = $request->seat_id;
            $seat_arrangement->row_id = $request->row[$i];
            $seat_arrangement->col_id = $request->col[$i];
            $seat_arrangement->seat_type_id = $request->seat_type[$i];
            $seat_arrangement->seat_name = $request->name[$i];
            $seat_arrangement->modified_by = \Auth::user()->id;
            $seat_arrangement->modification_date = Carbon::now();

            $seat_arrangement->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
