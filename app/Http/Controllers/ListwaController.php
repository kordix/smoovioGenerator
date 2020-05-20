<?php

namespace App\Http\Controllers;

use App\Listwa;
use Illuminate\Http\Request;

class ListwaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Listwa::all();
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
     * @param  \App\Listwa  $listwa
     * @return \Illuminate\Http\Response
     */
    public function show(Listwa $listwa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listwa  $listwa
     * @return \Illuminate\Http\Response
     */
    public function edit(Listwa $listwa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listwa  $listwa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listwa $listwa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listwa  $listwa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listwa $listwa)
    {
        //
    }
}
