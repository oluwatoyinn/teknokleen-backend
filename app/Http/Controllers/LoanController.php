<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use App\Http\Resources\LoanResource;

class LoanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loans =Loan::latest()->get();
     
        return $this->sendResponse(LoanResource::collection($loans));
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
        $rules=[
            'name'=>'required',
            'salary'=>'required|numeric',
            'amountBorowed'=>'required|numeric',
            'quarantor'=>'required',
            'paymentMethod'=>'required|numeric',
            'deduction'=>'required|numeric',
            'amountPaid'=>'required|numeric',
            'loanBalance'=>'required|numeric',
        ];
        $this->validate($request,$rules);

       $loan = new Loan;

       $loan->name=$request->input('name');
       $loan->salary=$request->input('salary');
       $loan->amount_borowed=$request->input('amountBorowed');
       $loan->quarantor=$request->input('quarantor');
       $loan->payment_method=$request->input('paymentMethod');
       $loan->deduction=$request->input('deduction');
       $loan->amount_paid=$request->input('amountPaid');
       $loan->loan_balance=$request->input('loanBalance');

       $loan->save();

       return $this->sendResponse(new LoanResource($loan));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      
         $loan = Loan::find($id);

         if(is_null($loan)){ 
             return response()->json([
                 'message'=>'Loan Not Found'
            ],404);
         }
         return $this->sendResponse(new LoanResource($loan));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $loan = Loan::findOrFail($id);
        $loan->name = $request->name;
        $loan->salary=$request->salary;
        $loan->amount_borowed=$request->amountBorowed;
        $loan->quarantor=$request->iquarantor;
        $loan->payment_method=$request->paymentMethod;
        $loan->deduction=$request->deduction;
        $loan->amount_paid=$request->amountPaid;
        $loan->loan_balance=$request->loanBalance;

        $loan->update();

        return response()->json([
            'success'=>true,
            'message'=>"Successfully Updated",
            'data'=>$loan
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id );
        if($loan) {
           $loan->delete();
           return $this->deleteResponse(new LoanResource($loan));
        }
    }
}
