<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class SmartphoneController extends Controller
{
    public function SmartphoneStore() {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphoneCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $smartphones = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Smartphones.index', ['smartphones' => $smartphones, 'smartphoneCount' => $smartphoneCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $smartphone= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('smartphoneid')) ]);
        $Comments = $smartphone->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('smartphoneid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/smartphones/".request('smartphoneid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphone = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Smartphones.Details', [ "smartphone" => $smartphone]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphones = $collection->find();  
        return view('Admin.Smartphones.index', ['smartphones' => $smartphones]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphone = $collection->find();
        return view('admin.Smartphones.create', [ "smartphones" => $smartphone ]);
    }

    public function Store() {
        $smartphone = [
            "name" => request("name"),
            "generation" => request("generation"),
            "brand" => request("brand"),
            "price" => request("price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $insertOneResult = $collection->insertOne($smartphone);
        return redirect("/admin/smartphones");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphone = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Smartphones.edit', [ "smartphone" => $smartphone ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphone = [
            "name" => request("name"),
            "generation" => request("generation"),
            "brand" => request("brand"),
            "price" => request("price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("smartphoneid"))
        ], [
            '$set' => $smartphone
        ]);
        return redirect('/admin/smartphones/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphone = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Smartphones.delete', [ "smartphone" => $smartphone ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("smartphoneid"))
        ]);
        return redirect('/admin/smartphones/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Electronics->Smartphones;
        $smartphone = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Smartphones.details', [ "smartphone" => $smartphone ]);
    }

}