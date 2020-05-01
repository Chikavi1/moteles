<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservation;
use Carbon\Carbon;
use App\room;

class ReservationController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $todo = $request->all();
         dd($todo);
         
         $room = room::findorfail($request->room)->first();

        $reservation = new reservation(
        [
            'invoice' => 'biwub32sasq',
            'price' => $room->price,
            'description' => $room->description,
            'status' => 'pendiente',
            'day' => $request->get('day'),
            'bussiness_id' => 1,
            'user_id' => 1

        ]);
       // $reservation->save();


        return view('reservation.process_pay')->with(compact('todo'));
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
