<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProducerController extends Controller
{
    public function index()
    {

        $producers = Producer::latest()->paginate(15);
        // return view('admin.producer',compact('producers'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        // $producers = Producer::all();
        // return view('admin.producer')->with('producers', $producers);



        return $producers; //api

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createProducer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd('abc');
        $request->validate([
            // 'producer_id' => 'required',
            'producer_name' => 'required',
        ]);
        $input = $request->all();
        Producer::create($input);
        // dd($input);
        
        return Redirect::route('producer.index')->with('flash_message','Producer Added!!!');


        //api

       // return Producer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Producer $producer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($producer_id)
    {
        return view('admin.editProducer')->with('producers', Producer::find($producer_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producer $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producer_id)
    {
        $request->validate([
            // 'title' => 'required',
            'producer_name' => 'required',
        ]);
        $producer = Producer::find($producer_id);
        $producer->update($request->all());

        return Redirect::route('producer.index')->with('flash_message','Producer updated successfully');

        // Api
        // return response('Update successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy($producer_id)
    {
        $producers = Producer::find($producer_id);
         $producers->delete();
        // Producer::destroy($producer_id);
        return redirect(route('producer.index'))->with('flash_message', 'Contact deleted!');


        
        // Api
        // return response('Delete successfully',200);
    }
}
