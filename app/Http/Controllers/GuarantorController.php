<?php

namespace App\Http\Controllers;

use App\Guarantor;
use Illuminate\Http\Request;
use App\Http\Resources\GuarantorResource;
use App\Http\Resources\AmbassadorResource;

class GuarantorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guarantors = Guarantor::latest()->get();
        return $this->sendResponse(GuarantorResource::collection($guarantors));

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
            'name'=>'required',
            'gender'=>'required',
            'passport'=>'required|image|mimes:jpeg,png,git,svg|max:2048',
            'age'=>'required|numeric',
            'phone_number'=>'required',
            'occupation'=>'required',
            'office_address'=>'required',
            'home_address'=>'required',
            'ambassador_id'=>'required',
            'home_address'=>'required'
        ];
        $this->validate($request,$rules);

        $guarantor = new Guarantor;

        $guarantor->name =$request->name;
        $guarantor->gender =$request->gender;
        $guarantor->age =$request->age;
        $guarantor->phone_number =$request->phone_number;
        $guarantor->occupation =$request->occupation;
        $guarantor->office_address =$request->office_address;
        $guarantor->home_address =$request->home_address;
        $guarantor->ambassador_id =$request->ambassador_id;


        if($request->hasFile('passport'))
        {
            $image =$request->file('passport');
            $filename =$image->getClientOriginalName();
            $filesize =$image->getSize();
            $filextension= $image->getClientOriginalExtension();
            $save_image = time().".".$filextension;
        }

        $guarantor->passport = $save_image;

        $guarantor->save();

        $image->move('guarantorImage/', $save_image);


        return $this->sendResponse(new GuarantorResource($guarantor));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function show(Guarantor $guarantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function edit(Guarantor $guarantor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guarantor = Guarantor::findOrFail($id);
        $guarantor->name=$request->name;
        $guarantor->gender =$request->gender;
        $guarantor->age=$request->age;
        $guarantor->phone_number=$request->phone_number;
        $guarantor->occupation=$request->occupation;
        $guarantor->office_address=$request->office_address;
        $guarantor->home_address=$request->home_address;
        $guarantor->ambassador_id=$request->ambassador_id;
        // $ambassadorGuarantor->passport=$request->passport;


        if($request->hasFile('passport'))
        {
            $image =$request->file('passport');
            $filename =$image->getClientOriginalName();
            $filesize =$image->getSize();
            $filextension= $image->getClientOriginalExtension();
            $save_image = time().".".$filextension;
            
        }

        $guarantor->update();
    
        return response()->json([
            'success'=>true,
            'message'=>'Guarantor Successfully Updated',
            'data'=>$guarantor
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guarantor = Guarantor::findOrFail($id);

        if(!$guarantor){
            return response()->json([
                'data'=>"No Guarantor found"
            ],400);
        }
        
        // $ambassador = Guarantor::findOrFail($id);

        if($guarantor->guarantor)
        {
            unlink(public_path('guarantorImage') . $guarantor->guarantor->filename);
        }

        $guarantor->delete();

        //  return response()->json([
        //     'data'=>'Guarantor Removed'
        // ],200);
        return $this->deleteResponse($guarantor);

    }
}
