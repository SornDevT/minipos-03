<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    //

    public function index(){

        $Search = \Request::get('search'); // ຄົ້ນຫາ
        // $page = \Request::get('page'); // ເກັບຂໍ້ມູນໜ້າ ທີ່ຖຶກສົ່ງມາ

        $store = Store::where("name","LIKE","%{$Search}%")
        ->orWhere("price_buy","LIKE","%{$Search}%")
        ->orderBy('created_at','desc')
        ->paginate(5)
        ->toArray();

        return array_reverse($store);

        //$store = Store::orderBy('created_at','asc')->get();
        //return $store;
        
        
    }

    public function add(Request $request){

        try {

                if($request->file('file')){
                    $upload_path = "assets/img";
                    $generate_new_img = 'store-'.time().'.'.$request->file->getClientOriginalExtension();
                    $image = $request->file('file');
                    $img = Image::make($image->getRealpath());
                    $img->resize(
                        800, null, function($constraint){
                            $constraint->aspectRatio();
                        });
                    $img->save($upload_path.'/'.$generate_new_img);  // ບັນທຶກຂື້ນ Server

                } else {
                    $generate_new_img = '';
                }

                $store = new Store();
                $store->name = $request->name;
                $store->images = $generate_new_img;
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

    public function edit($id){

        $store = Store::find($id);
        return response()->json($store);
    }

    public function update($id, Request $request){

        $store = Store::find($id);

        if($request->file('file')){ // ມີການອັບໂຫລດຮູບພາບ

            $upload_path = 'assets/img';
            
            /// ກວດຊອບ ລຶບໄຟລ໌ຮູບເກົ່າ
                if($store->images!='' && $store->images!=null){
                    if(file_exists('assets/img/'.$store->images)){ // ກວດຊອບວ່າໄຟລ໌ມີຈິງໃນ Server ຫຼືບໍ່
                        unlink('assets/img/'.$store->images); // ທຳການລຶບ
                    }
                }

                $generate_new_img = 'store-'.time().'.'.$request->file->getClientOriginalExtension();
                $image = $request->file('file');
                $img = Image::make($image->getRealpath());
                $img->resize(
                    800, null, function($constraint){
                        $constraint->aspectRatio();
                    });
                $img->save($upload_path.'/'.$generate_new_img); 

                $store->update([
                    'name' => $request->name,
                    'images' => $generate_new_img,
                    'amount' => $request->amount,
                    'price_buy' => $request->price_buy,
                    'price_sell' => $request->price_sell,
                ]);


        } else { // ເງື່ອນໄຂ ບໍ່ໄດ້ອັບໂຫລກຮູບພາບ

            $store->update([
                'name' => $request->name,
                'amount' => $request->amount,
                'price_buy' => $request->price_buy,
                'price_sell' => $request->price_sell,
            ]);

        }

        
    }

    public function delete($id){
            $store = Store::find($id);
            $store->delete();
    }
}
