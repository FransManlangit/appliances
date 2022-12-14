<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Appliances;
use App\Models\Order;

use View;
use Storage;
use DB;
use Log;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getconsultation()
     {
         return View::make('consultation.index');
     }

    public function index()
    {
        if ($request->ajax()){
            $consultations = consultation::orderBy('consultation_id','DESC')->get();
            return response()->json($consultations);
            }
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
        $consultation = new consultation;
        $consultation->defective = $request->defective;
        // $consultation->recommendation= $request->recommendation;
        // $consultation->price = $request->price;
       

        $files = $request->file('uploads');
        $consultation->imagePath = 'images/'.$files->getClientOriginalName();
        // $consultation->imagePath = uniqid().'_'.$files->getClientOriginalName();
        $consultation->save();
        Storage::put('/public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        return response()->json(["success" => "consultation created successfully.","consultation" => $consultation ,"status" => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        $consultations = consultation::find($id);
        return response()->json($consultations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
