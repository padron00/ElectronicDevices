<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class LaptopController extends Controller
{
    public function LaptopStore() {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptopCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $laptops = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Laptops.index', ['laptops' => $laptops, 'laptopCount' => $laptopCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $laptop= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('laptopid')) ]);
        $Comments = $laptop->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('laptopid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/laptops/".request('laptopid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptop = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Laptops.Details', [ "laptop" => $laptop]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptops = $collection->find();  
        return view('Admin.Laptops.index', ['laptops' => $laptops]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptop = $collection->find();
        return view('admin.Laptops.create', [ "laptops" => $laptop ]);
    }

    public function Store() {
        $laptop = [
            "laptop_name" => request("laptop_name"),
            "brand" => request("brand"),
            "processor_type" => request("processor_type"),
            "disk_space" => request("disk_space"),
            "price" => request("price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $insertOneResult = $collection->insertOne($laptop);
        return redirect("/admin/laptops");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptop = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Laptops.edit', [ "laptop" => $laptop ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptop = [
            "laptop_name" => request("laptop_name"),
            "brand" => request("brand"),
            "processor_type" => request("processor_type"),
            "disk_space" => request("disk_space"),
            "price" => request("price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("laptopid"))
        ], [
            '$set' => $laptop
        ]);
        return redirect('/admin/laptops/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptop = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Laptops.delete', [ "laptop" => $laptop ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("laptopid"))
        ]);
        return redirect('/admin/laptops/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Electronics->Laptops;
        $laptop = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Laptops.details', [ "laptop" => $laptop ]);
    }

}