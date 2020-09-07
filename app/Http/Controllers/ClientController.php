<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::latest()->get();
        return $this->sendResponse(ClientResource::collection($clients));
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
            'companyName'=>'required',
            'address'=>'required',
            'email'=>'email|required|unique:users',
            'state'=>'required',
            'city'=>'required',
            'website'=>'required',
            'contactPerson'=>'required',
            'contactNo'=>'required|numeric',
            'contractValue'=>'required'
        ];

        $this->validate($request,$rules);

        $client = new Client;

        $client->company_name = $request->input('companyName');
        $client->address= $request->input('address');
        $client->state= $request->input('state');
        $client->city= $request->input('city');
        $client->email= $request->input('email');
        $client->website= $request->input('website');
        $client->contact_person= $request->input('contactPerson');
        $client->contact_no= $request->input('contactNo');
        $client->contract_value= $request->input('contractValue');

        $client->save();

        return $this->sendResponse(new ClientResource($client));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::find($id);
        //RETURN A SINGLE AMBASSADOR AS A RESOURCE
        if(is_null($client)){ 
            return response()->json([
                'message'=>'Client Not Found'
           ],404);
        }
        return $this->sendResponse(new ClientResource($client));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $client = Client::findOrFail($id);
        $client->company_name = $request->companyName;
        $client->address= $request->address;
        $client->state= $request->state;
        $client->city= $request->city;
        $client->email= $request->email;
        $client->website= $request->website;
        $client->contact_person= $request->contactPerson;
        $client->contact_no= $request->contactNo;
        $client->contract_value= $request->contractValue;
        $client->update();

        return $this->sendResponse(new ClientResource($client));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::findOrFail($id );
        if($client) {
           $client->delete();
           return $this->deleteResponse(new ClientResource($client));
        }
    }
}
