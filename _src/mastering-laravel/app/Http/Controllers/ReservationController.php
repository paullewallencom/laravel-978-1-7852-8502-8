<?php namespace MyCompany\Http\Controllers;

use MyCompany\Accommodation\Reservation;
use MyCompany\Http\Requests;
use MyCompany\Http\Controllers\Controller;
use MyCompany\Accommodation\ReservationValidator;
use Illuminate\Http\Request;

class ReservationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Reservation::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 return view('auth/reserve');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $reservationRepository = new \MyCompany\Accommodation\ReservationRepository(
            new \MyCompany\Accommodation\Reservation());
        $reservationValidator = new ReservationValidator();
        if ($reservationValidator->validate(Input::get('start_date'),Input::get('end_date'),Input::get('rooms'))) {
            $reservation = $reservationRepository->create(['date_start'=>Input::get('start_date'),'date_end'=>Input::get('end_date'),'rooms'=>Input::get('rooms')]);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
