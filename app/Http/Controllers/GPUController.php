<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class GPUController extends Controller
{
    public function GPUStore() {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpuCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $gpus = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('GPUs.index', ['gpus' => $gpus, 'gpuCount' => $gpuCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $gpu= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('gpuid')) ]);
        $Comments = $gpu->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('gpuid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/gpus/".request('gpuid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpu = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('GPUs.Details', [ "gpu" => $gpu]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpus = $collection->find();  
        return view('Admin.GPUs.index', ['gpus' => $gpus]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpu = $collection->find();
        return view('admin.GPUs.create', [ "gpus" => $gpu ]);
    }

    public function Store() {
        $gpu = [
            "Name" => request("Name"),
            "Architecture" => request("Architecture"),
            "Best_Resolution" => request("Best_Resolution"),
            "Manufacturer" => request("Manufacturer"),
            "Memory" => request("Memory"),
            "PSU" => request("PSU"),
            "Pixel_Rate" => request("Pixel_Rate"),
            "Process" => request("Process"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $insertOneResult = $collection->insertOne($gpu);
        return redirect("/admin/gpus");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpu = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.GPUs.edit', [ "gpu" => $gpu ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpu = [
            "Name" => request("Name"),
            "Architecture" => request("Architecture"),
            "Best_Resolution" => request("Best_Resolution"),
            "Manufacturer" => request("Manufacturer"),
            "Memory" => request("Memory"),
            "PSU" => request("PSU"),
            "Pixel_Rate" => request("Pixel_Rate"),
            "Process" => request("Process"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("gpuid"))
        ], [
            '$set' => $gpu
        ]);
        return redirect('/admin/gpus/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpu = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.GPUs.delete', [ "gpu" => $gpu ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("gpuid"))
        ]);
        return redirect('/admin/gpus/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Electronics->GPUs;
        $gpu = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.GPUs.details', [ "gpu" => $gpu ]);
    }

}