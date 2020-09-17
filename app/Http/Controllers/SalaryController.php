<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;
use App\Http\Resources\SalaryResource;

class SalaryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salaries = Salary::latest()->get();
        return $this->sendResponse(SalaryResource::collection($salaries));
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
        $rules =[
            'name'=>'required',
            'salary'=>'required|numeric',
            'bankName'=>'required',
            'accountNumber'=>'required|numeric',
            'holderName'=>'required',
            'taxReduction'=>'required|numeric',
        ];
        $this->validate($request, $rules);

        $salary = new Salary;

        $salary->Name = $request->input('name');
        $salary->contract_value = $request->input('salary');
        $salary->bank_name = $request->input('bankName');
        $salary->account_no = $request->input('accountNumber');
        $salary->holderName = $request->input('holderName');
        $salary->tax_reduction = $request->input('taxReduction');

        $salary->save();

        return $this->sendResponse(new SalaryResource($salary));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $salary = Salary::find($id);
        //RETURN A SINGLE AMBASSADOR AS A RESOURCE
        if(is_null($salary)){ 
            return response()->json([
                'message'=>'Salary Not Found'
           ],404);
        }
        return $this->sendResponse(new SalaryResource($salary));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $salary = Salary::findOrFail($id);

        $salary->Name = $request->name;
        $salary->contract_value = $request->salary;
        $salary->bank_name = $request->bankName;
        $salary->account_no = $request->accountNumber;
        $salary->holderName = $request->holderName;
        $salary->tax_reduction = $request->taxReduction;

        $salary->update();

        return $this->sendResponse(new SalaryResource($salary));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $salary = Salary::findOrFail($id );
        if($salary) {
           $salary->delete();
           return $this->deleteResponse(new SalaryResource($salary));
        }
    }
}
