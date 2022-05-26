<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    //

    public function index(){

        $store = Store::orderBy('created_at','asc')->get();
        //return $store;
        return $store;
    }

    public function add(Request $request){

        try {
                $store = new Store();
                $store->name = $request->name;
                //$store->images = $generate_new_img;
                $store->amount = $request->amount;
                $store->price_buy = $request->price_buy;
                $store->price_sell = $request->price_sell;
                $store->save();

                $success = true;
                $message = "ບັນທຶກຂໍ້ມູນສຳເລັດ!";

        
        } catch (\Illnminate\Database\QueryException $ex) {
            //throw $th;
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);

    }

    public function update($id, Request $request){

        $store = Store::find($id);
        $store->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'price_buy' => $request->price_buy,
            'price_sell' => $request->price_sell,
        ]);
    }

    public function delete($id){
            $store = Store::find($id);
            $store->delete();
    }
}
