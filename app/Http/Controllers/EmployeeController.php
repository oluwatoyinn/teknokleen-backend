<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::latest()->get();
        return $this->sendResponse(EmployeeResource::collection($employees));
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
        $rules = [
            'firstName'=>'required',
            'middleName'=>'required',
            'lastName'=>'required',
            'email'=>'email|required|unique:users',
            'gender'=>'required',
            'DOB'=>'required',
            'phoneNumber'=>'required|numeric',
            'employedDate'=>'required',
            'confirmation'=>'required'
        ];
        $this->validate($request,$rules);

        $employee = new Employee;

        $employee->first_name = $request->input('firstName');
        $employee->middle_name = $request->input('middleName');
        $employee->last_name = $request->input('lastName');
        $employee->email = $request->input('email');
        $employee->birth_date = $request->input('DOB');
        $employee->gender = $request->input('gender');
        $employee->phone_number = $request->input('phoneNumber');
        $employee->employed_date = $request->input('employedDate');
        $employee->confirmation =$request->input('comfirmation');

        $employee->save();

        return $this->sendResponse(new EmployeeResource($employee));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::find($id);
        //RETURN A SINGLE AMBASSADOR AS A RESOURCE
        if(is_null($employee)){ 
            return response()->json([
                'message'=>'Employee Not Found'
           ],404);
        }
        return $this->sendResponse(new EmployeeResource($employee));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = Employee::findOrFail($id);

        $employee->first_name = $request->firstName;
        $employee->middle_name = $request->middleName;
        $employee->last_name = $request->lastName;
        $employee->email = $request->email;
        $employee->birth_date = $request->DOB;
        $employee->gender = $request->gender;
        $employee->phone_number = $request->phoneNumber;
        $employee->employed_date = $request->employedDate;
        $employee->confirmation = $request->confirmation;

        $employee->update();

        return $this->sendResponse(new EmployeeResource($employee));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::findOrFail($id );
        if($employee) {
           $employee->delete();
           return $this->deleteResponse(new EmployeeResource($employee));
        }
    }
}
