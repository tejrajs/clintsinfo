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
    	
		//$clients = ['id','name','email','gender','phone','address','nationality','date_of_birth','education','preferred_contact'];    	 
    	//echo '<pre>';print_r($clients);die;
    	
//         \Maatwebsite\Excel\Facades\Excel::load('storage/excel/exports/clients.csv', function ($reader) use(&$clients){
//         	$reader->each(function ($sheet) use(&$clients){
//         		foreach ( $sheet->toArray() as $row){
//         			$clients[] = $row;
//         		}
//         	});
//         });
        \Maatwebsite\Excel\Facades\Excel::batch('storage/excel/exports/', function($rows, $file) use(&$clients) {
        	$rows->each(function($row) use(&$clients) {
        		$clients[] = $row;
        	});
        
        });
        
        //echo '<pre>'; print_r($clients);die;
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
        $id = 0;
        $clients = [];
    	//echo '<pre>'; print_r($request->all());die;
    	//$clients[] = ['id' => 'id','name' => 'name','email' => 'email','gender' => 'gender','phone' => 'phone','address' => 'address','nationality' => 'nationality','date_of_birth' => 'date_of_birth','education' => 'education','preferred_contact' => 'preferred_contact'];
    	//$value = ['id','name','email','gender','phone','address','nationality','date_of_birth','education','preferred_contact'];
    	\Maatwebsite\Excel\Facades\Excel::batch('storage/excel/exports/', function($rows, $file) use(&$clients, &$id) {
        	$rows->each(function($row) use(&$clients, &$id) {
        		$clients[] = [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]];
        		$id = $row[0];
        	});
        
        });
    	//echo '<pre>'; print_r($clients);die;
    		
    	\Maatwebsite\Excel\Facades\Excel::create('clients', function($excel) use(&$request, &$clients, &$id) {
    		$excel->sheet('clients', function($sheet) use(&$request, &$clients, &$id) {
    			$value = $request->all();
   				$clients[] = [
 					$id+1,
 					$value['name'],
 					$value['email'],
 					$value['gender'],
 					$value['phone'],	
 					$value['address'],
 					$value['nationality'],
 					$value['date_of_birth'],
 					$value['education'],
 					$value['preferred_contact']
 				];
   				//echo '<pre>'; print_r($clients);die;
    			$sheet->fromArray($clients);
    		
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
    	$clients = [];
    	\Maatwebsite\Excel\Facades\Excel::batch('storage/excel/exports/', function($rows, $file) use(&$clients, &$id) {
    		$rows->each(function($row) use(&$clients, &$id) {
    			if($id == $row[0]){
    				$clients = [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]];
    			}
    		});
    			 
    	});
    	return view('client-excel.show', compact('clients'));
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
    	$clients = [];
    	\Maatwebsite\Excel\Facades\Excel::batch('storage/excel/exports/', function($rows, $file) use(&$clients, &$id) {
    		$rows->each(function($row) use(&$clients, &$id) {
    			if($id == $row[0]){
    				$clients = ['id' => $row[0], 'name' =>$row[1], 'email'=> $row[2], 'gender' => $row[3], 'phone' => $row[4], 'address' => $row[5], 'nationality' => $row[6], 'date_of_birth' => $row[7], 'education' => $row[8], 'preferred_contact' => $row[9]];
    			}
    		});
    	
    	});
    	$clients = (object)$clients;
    	return view('client-excel.edit', compact('clients'));
    	
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
    	$clients = [];

    	\Maatwebsite\Excel\Facades\Excel::batch('storage/excel/exports/', function($rows, $file) use(&$request, &$clients, &$id) {
    		$value = $request->all();
    		$rows->each(function($row) use(&$value, &$clients, &$id) {
    			if($id == $row[0]){
    				$clients[] = [$row[0], $value['name'], $value['email'], $value['gender'], $value['phone'], $value['address'], $value['nationality'], $value['date_of_birth'], $value['education'], $value['preferred_contact']];
    			}else{
    				$clients[] = [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]];
    			}
    		});
    	
    	});
    	//echo '<pre>'; print_r($clients);die;
    	
    	\Maatwebsite\Excel\Facades\Excel::create('clients', function($excel) use(&$request, &$clients, &$id) {
    		$excel->sheet('clients', function($sheet) use(&$request, &$clients, &$id) {
    			$value = $request->all();
    			$sheet->fromArray($clients);
    		});
    	})->store('csv', storage_path('excel/exports'));
    		
    	return redirect()->route('client-excel.index')->with('message','Client Updated Sucessfully');
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
    	$clients = [];
    	
    	\Maatwebsite\Excel\Facades\Excel::batch('storage/excel/exports/', function($rows, $file) use(&$clients, &$id) {
    		$rows->each(function($row) use(&$clients, &$id) {
    			if($id != $row[0]){
    				$clients[] = [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]];
    			}
    		});
    			 
    	});
    	//echo '<pre>'; print_r($clients);die;
    		 
    		\Maatwebsite\Excel\Facades\Excel::create('clients', function($excel) use(&$request, &$clients, &$id) {
    			$excel->sheet('clients', function($sheet) use(&$request, &$clients, &$id) {
    				$sheet->fromArray($clients);
    			});
    		})->store('csv', storage_path('excel/exports'));
    	
    		return redirect()->route('client-excel.index')->with('message','Client Deleted Sucessfully');
    }
}
