<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Requests\ClientsRequest;
use Maatwebsite\Excel\Excel;

class ClientExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$clients = [];
        \Maatwebsite\Excel\Facades\Excel::load('storage/excel/exports/clients.csv', function ($reader){
        	$reader->each(function ($sheet){
        		foreach ( $sheet->toArray() as $row){
        			$clients[] = $sheet->toArray();
        		}
        	});
        });
       print_r($clients);die;
    	return view('client-excel.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    	return view('client-excel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        //
    	$clients = [];
    	\Maatwebsite\Excel\Facades\Excel::load('storage/excel/exports/clients.csv', function ($reader){
    		$reader->each(function ($sheet){
    			foreach ( $sheet->toArray() as $row){
    				$clients[] = $sheet->toArray();
    			}
    		});
    	});
    	
    	\Maatwebsite\Excel\Facades\Excel::create('clients', function($excel) use($request) {
    		$excel->sheet('clients', function($sheet) use($request) {
    			$clients;
    			$sheet->fromArray($request->all());
    		
    		});
    	})->store('csv', storage_path('excel/exports'));
    	return redirect()->route('client-excel.index')->with('message','New Client Added Sucessfully');
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
    public function update(ClientsRequest $request, $id)
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
