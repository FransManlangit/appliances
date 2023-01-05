<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
use App\Models\Customer;
use Illuminate\Http\Request;
use View;
use Storage;
use File;
use DB;
use Log;

class ApplianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $appliances = Appliance::with(['customers'])->orderBy('id','DESC')->get();
            return response()->json($appliances);   
        }

        $customers = Customer::select("customer_id", DB::raw("CONCAT(fname,' ',lname) AS name"))->pluck('name','customer_id');
        return View::make('appliance.insert',compact('customers'));
    }

    public function getapplianceAll(Request $request){
        // if ($request->ajax()){
            $appliances = appliance::orderBy('appliance_id','DESC')->get();
            return response()->json($appliances);
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

      if($file = $request->hasFile('uploads')) {
        $appliance = new appliance;
        $appliance->appliance_id = $appliance->id;
        $appliance->customer_id = $request->customer_id;
        $appliance->model = $request->model;
        $appliance->brand= $request->brand;
      

        $files = $request->file('uploads');
        $appliance->imagePath = 'images/'.$files->getClientOriginalName();
        Storage::put('/public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        $appliance->save();
        return response()->json(["success" => "appliance created successfully.","appliance" => $appliance ,"status" => 200]);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appliances  $appliances
     * @return \Illuminate\Http\Response
     */
    public function show(Appliances $appliances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appliances  $appliances
     * @return \Illuminate\Http\Response
     */
    public function edit(Appliances $appliances)
    {
        

        $applaicne = Appliance::find($id);
        return response('appliance.edit')->json($appliance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appliances  $appliances
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if ($request->ajax()) {
            $appliances = Appliance::find($id);
            $appliances->model = $request->model;
            $appliances->brand = $request->brand;
       
      
           

            $files = $request->file('uploads');
        	$appliances->imagePath = 'images/'.$files->getClientOriginalName();
         
            $appliances->update();
            Storage::put('/public/images/'.$files->getClientOriginalName(), file_get_contents($files));


            // $appliance = $appliance->update($request->all());
             return response()->json($appliances);
            // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appliances  $appliances
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appliances $appliances)
    {
        //
    }
}