<?php

namespace App\Http\Controllers;
use App\Models\Repair;
use Illuminate\Http\Request;
use View;
use Storage;
use File;
use DB;
use Log;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('repair.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getrepairAll(Request $request){
        // if ($request->ajax()){
            $repairs = repair::orderBy('repair_id','DESC')->get();
            return response()->json($repairs);
         }

    public function create()
    {
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
            $repair = new repair;
            $repair->repair_id = $repair->id;
            $repair->type = $request->type;
            $repair->description= $request->description;
            $repair->price= $request->price;
          
    
            $files = $request->file('uploads');
            $repair->imagePath = 'images/'.$files->getClientOriginalName();
            Storage::put('/public/images/'.$files->getClientOriginalName(),file_get_contents($files));
            $repair->save();
            return response()->json(["success" => "repair created successfully.","repair" => $repair ,"status" => 200]);
        }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repair $repair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        //
    }

    // public function postCheckout(Request $request){

    //     // $items = json_decode($request->json()->all());
    //     $items = json_decode($request->getContent(),true);
    //     // Log::info(print_r($request->getContent()));
    //     Log::info(print_r($items, true));
    //       try {
    //           DB::beginTransaction();
    //           $order = new Order();
    //           $repair =  repair::find(3);
    //           // dd($cart->items);
    //         $repair->orders()->save($order);
    //           // dd($cart->items);
    //         // Log::info(print_r($order->orderinfo_id, true));
    //         foreach($items as $item) {
    //           // Log::info(print_r($item, true));
    //            $id = $item['item_id'];
    //            // Log::info(print_r($, true));
    //            $order->items()->attach($order->orderinfo_id,['quantity'=> $item['quantity'],'item_id'=>$id]);
    //            // Log::info(print_r($order, true));
    //            $stock = Stock::find($id);
    //            $stock->quantity = $stock->quantity - $item['quantity'];
    //            $stock->save();
    //         }
            
    //     }
    //     catch (\Exception $e) {
    //         DB::rollback();
    //         return response()->json(array('status' => 'Order failed','code'=>409,'error'=>$e->getMessage()));
    //         }
    
    //     DB::commit();
    //     return response()->json(array('status' => 'Order Success','code'=>200,'order id'=>$order->orderinfo_id));
    
    //     }//end postcheckout
}
