<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
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
    public function index()
    {
        //
        return View::make('appliance.index');
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
        //
        // $input = $request->all();

        // if($file = $request->hasFile('image')) {
            
        //     $file = $request->file('image') ;
        //     $fileName = $file->getClientOriginalName();
        //     // dd($fileName);
        //     $request->image->storeAs('images', $fileName, 'public');
        //     $input['imagePath'] = 'images/'.$fileName;
        //     $appliance = Appliance::create($input);
        // }

        // if (Auth::user()->role == 'appliance'){
        //     // dd($pet);
    
        //    return \Redirect::to('/appliance')->with('success','Appliance Created Successfully!');
        // }
    
        // $appliance = Appliance::create($request->all());
        // //     return response()->json($appliance);
        // if($file = $request->hasFile('uploads')) {
        // $appliance = new appliance;
        // $appliance->appliance_id = $appliance->id;
        //     $appliance->model = $request->model;
        //     $appliance->brand = $request->brand;
        //     // $appliance->user_id = $request->user_id;
            
    
        //     $files = $request->file('uploads');
        //     $appliance->imagePath = 'images/'.$files->getClientOriginalName();
        //     Storage::put('/public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        //     $appliance->save();
        //     return response()->json(["success" => "appliance created successfully.","appliance" => $appliance ,"status" => 200]);
        
        // }

      if($file = $request->hasFile('uploads')) {
        $appliance = new appliance;
        $appliance->appliance_id = $appliance->id;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appliances  $appliances
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appliances $appliances)
    {
        //
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
