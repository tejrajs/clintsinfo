<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Clients;
use App\Http\Requests\ClientsRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Detail All Clients
        $clients = Clients::paginate(2);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create Clients Form
    	return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        //Store Enter Form Data to Database 
        Clients::create($request->all());
    	return redirect()->route('clients.index')->with('message','New Client Added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //Show Client Detail
    	return view('clients.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //Edit Client Detail
    	return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request, Clients $clients)
    {
        //Save Updated Client Data to Database
        $clients->update($request->all());
        return redirect()->route('clients.index')->with('message','Client Detail Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //Destroy Client Detail
        $clients->delete();
    	return redirect()->route('clients.index')->with('message','Client Detail Deleted Sucessfully');
    }
}
