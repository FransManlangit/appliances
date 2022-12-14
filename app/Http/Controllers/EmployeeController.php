<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use View;
use Storage;
use File;
use DB;
use Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('employee.index');
    }

    public function getEmployeeAll(Request $request){
        // if ($request->ajax()){
            $employees = Employee::orderBy('employee_id','DESC')->get();
            return response()->json($employees);
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
        $user->role = 'employee';
        $user->save();
    
        if($file = $request->hasFile('uploads')) {
        $employee = new employee;
        $employee->user_id = $user->id;
            $employee->fname = $request->fname;
            $employee->lname = $request->lname;
            $employee->addressline = $request->addressline; 
            $employee->town = $request->town;
            $employee->zipcode = $request->zipcode;
            $employee->phone = $request->phone;       
            
            
         
    
            $files = $request->file('uploads');
            $employee->imagePath = 'images/'.$files->getClientOriginalName();
            Storage::put('/public/images/'.$files->getClientOriginalName(),file_get_contents($files));
            $employee->save();
            return response()->json(["success" => "employee created successfully.","employee" => $employee ,"status" => 200]);
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $id)
    {
        $employees = Employee::orderBy('employee_id','DESC')->get();
        return response()->json($employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if ($request->ajax()) {
            $employee = Employee::find($id);
            $employee->fname = $request->fname;
            $employee->lname = $request->lname;
            $employee->addressline = $request->addressline;
            $employee->town = $request->town;
            $employee->zipcode = $request->zipcode;
            $employee->phone = $request->phone;
            $files = $request->file('uploads');
            $employee->imagePath = 'images/'.$files->getClientsOriginalName();
            $employee->update();
            Storage::put('/public/images/'.$file->getClientsOriginalName(), file_get_contents($files));


            // $employee = $employee->update($request->all());
             return response()->json($employee);
            // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        // return Redirect::to('/employee')->with('success','employee deleted!');
        return response()->json(["success" => "employee deleted successfully.", "status" => 200]);
    }
}