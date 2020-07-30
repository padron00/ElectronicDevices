<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class CameraController extends Controller
{
    public function CameraStore() {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $cameraCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $cameras = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Cameras.index', ['cameras' => $cameras, 'cameraCount' => $cameraCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $camera= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('cameraid')) ]);
        $Comments = $camera->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('cameraid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/cameras/".request('cameraid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $camera = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Cameras.Details', [ "camera" => $camera]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $cameras = $collection->find();  
        return view('Admin.Cameras.index', ['cameras' => $cameras]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $camera = $collection->find();
        return view('admin.Cameras.create', [ "cameras" => $camera ]);
    }

    public function Store() {
        $camera = [
            "Model" => request("Model"),
            "Release_date" => request("Release_date"),
            "Max_resolution" => request("Max_resolution"),
            "Low_resolution" => request("Low_resolution"),
            "Dimensions" => request("Dimensions"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $insertOneResult = $collection->insertOne($camera);
        return redirect("/admin/cameras");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $camera = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Cameras.edit', [ "camera" => $camera ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $camera = [
            "Model" => request("Model"),
            "Release_date" => request("Release_date"),
            "Max_resolution" => request("Max_resolution"),
            "Low_resolution" => request("Low_resolution"),
            "Dimensions" => request("Dimensions"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("cameraid"))
        ], [
            '$set' => $camera
        ]);
        return redirect('/admin/cameras/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $camera = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Cameras.delete', [ "camera" => $camera ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("cameraid"))
        ]);
        return redirect('/admin/cameras/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Electronics->Cameras;
        $camera = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Cameras.details', [ "camera" => $camera ]);
    }

}