<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;

class ApiController extends Controller
{
    //
    public function createClient (Request $request) {
        $clientCreate = new Clients();
        $clientCreate-> name  = $request->name;
        $clientCreate -> p_lastname = $request -> p_lastname;
        $clientCreate -> m_lastname = $request -> m_lastname;
        $clientCreate -> address = $request -> address;
        $clientCreate -> email = $request -> email;
        $clientCreate->save();

        return response() -> json([
            "status"=>1,
            "message"=> "client created succesfully"
        ]);
    }


    public function getClients () {
        $clientResponse = Clients::get();
        return response() -> json([
            "status"=>1,
            "message"=> "clients obtained succesfully",
            "clients" => $clientResponse
        ]);
    }


    public function deleteClient ($id) {

        if ( Clients::where("id",$id)->exists()){
            $clientDelete = Clients::find($id);
            $clientDelete -> delete();
            return response() -> json([
                "status"=>1,
                "message"=> "client deleted succesfully"
            ]);
        } else{
            return response() -> json([
                "status"=>1,
                "message"=> "client not found"
            ]);
        }

    }

    public function editClient ( Request $request, $id) {
        $clientEdit = Clients::find($id);

        if ($clientEdit) {
            $clientEdit-> name  = $request->name;
            $clientEdit -> p_lastname = $request -> p_lastname;
            $clientEdit -> m_lastname = $request -> m_lastname;
            $clientEdit -> address = $request -> address;
            $clientEdit -> email = $request -> email;
            $clientEdit->save();
            return response() -> json([
                "status"=>1,
                "message"=> "client edited succesfully",
                "client" => $clientEdit
            ]);
        } else {
            return response() -> json([
                "status"=>1,
                "message"=> "client not found"
            ]);
        }



    }
}
