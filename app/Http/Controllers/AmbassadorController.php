<?php

namespace App\Http\Controllers;

use App\Ambassador;
use Illuminate\Http\Request;
use App\Http\Resources\AmbassadorResource;

class AmbassadorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ambassadors =Ambassador::latest()->get();
        // $ambassadors =Ambassador::paginate(10);
        return $this->sendResponse(AmbassadorResource::collection($ambassadors));
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
            'address'=>'required',
            'email'=>'email|required|unique:users',
            'gender'=>'required',
            'phoneNumber'=>'required|numeric',
            'location'=>'required'
        ];

        $this->validate($request,$rules);
        
        $ambassador = new Ambassador;

        // $ambassador->id = $request->input('ambassador_id');
        $ambassador->name = $request->input('name');
        $ambassador->address = $request->input('address');
        $ambassador->email = $request->input('email');
        $ambassador->gender = $request->input('gender');
        $ambassador->phone_number = $request->input('phoneNumber');
        $ambassador->location = $request->input('location');

        $ambassador->save();

        return $this->sendResponse(new AmbassadorResource($ambassador));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ambassador  $ambassador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          //GET A SINGLE AMBASSADOR
          $ambassador = Ambassador::find($id);
          //RETURN A SINGLE AMBASSADOR AS A RESOURCE
          if(is_null($ambassador)){ 
              return response()->json([
                  'message'=>'Ambassador Not Found'
             ],404);
          }
          return $this->sendResponse(new AmbassadorResource($ambassador));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ambassador  $ambassador
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambassador $ambassador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ambassador  $ambassador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ambassador = Ambassador::findOrFail($id);
        $ambassador->name = $request->name;
        $ambassador->address = $request->address;
        $ambassador->email = $request->email;
        $ambassador->gender = $request->gender;
        $ambassador->phone_number = $request->phoneNumber;
        $ambassador->location = $request->location;
        $ambassador->update();
        
        return response()->json([
            'success'=>true,
            'message'=>"Successfully Updated",
            'data'=>$ambassador
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ambassador  $ambassador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambassador = Ambassador::findOrFail($id );
        if($ambassador) {
           $ambassador->delete();
           return $this->deleteResponse(new AmbassadorResource($ambassador));
        }
    }
}
