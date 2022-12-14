<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;
use View;
use Storage;
use File;
use DB;
use Log;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('customer.index');
    }

    public function getCustomerAll(Request $request){
        // if ($request->ajax()){
            $customers = Customer::orderBy('customer_id','DESC')->get();
            return response()->json($customers);
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
    //     $customer = Customer::create($request->all());
    //     return response()->json($customer);

    $validator = \Validator::make($request->all(), [
        'email' => 'email| required| unique:users',
        'password' => 'required| min:3'
    ]);
    
    if($validator->fails()){
        return response()->json(['errors'=>$validator->errors()->all()]);
    }

    $user = new User([
        'name' => $request->input('fname').' '.$request->lname,
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password'))
    ]);
    $user->role = 'customer';
    $user->save();

    if($file = $request->hasFile('uploads')) {
    $customer = new customer;
    $customer->user_id = $user->id;
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->addressline = $request->addressline; 
        $customer->town = $request->town;
        $customer->zipcode = $request->zipcode;
        $customer->phone = $request->phone;
        // $customer->user_id = $request->user_id;
        
        
     

        $files = $request->file('uploads');
        $customer->imagePath = 'images/'.$files->getClientOriginalName();
        Storage::put('/public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        $customer->save();
        return response()->json(["success" => "customer created successfully.","customer" => $customer ,"status" => 200]);
    
    }


    
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $id)
    {
        $customers = Customer::orderBy('customer_id','DESC')->get();
        return response()->json($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if ($request->ajax()) {
            $customers = Customer::find($id);
            $customers->fname = $request->eefname;
            $customers->lname = $request->eelname;
            $customers->addressline = $request->eeaddressline;
            $customers->town = $request->eetown;
            $customers->zipcode = $request->eezipcode;
            $customers->phone = $request->eephone;
            $files = $request->file('uploads');
            $customers->imagePath = 'images/'.$files->getClientsOriginalName();
            $customers->update();
            Storage::put('/public/images/'.$file->getClientsOriginalName(), file_get_contents($files));


            // $customer = $customer->update($request->all());
             return response()->json($customer);
            // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        // return Redirect::to('/customer')->with('success','Customer deleted!');
        return response()->json(["success" => "customer deleted successfully.", "status" => 200]);
    }
}