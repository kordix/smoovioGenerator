<?php

namespace App\Http\Controllers;

use App\Kolor;
use Illuminate\Http\Request;

class KolorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kolor::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kolor  $kolor
     * @return \Illuminate\Http\Response
     */
    public function show(Kolor $kolor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kolor  $kolor
     * @return \Illuminate\Http\Response
     */
    public function edit(Kolor $kolor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kolor  $kolor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kolor $kolor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kolor  $kolor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kolor $kolor)
    {
        //
    }
}
