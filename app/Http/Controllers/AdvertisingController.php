<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Advertising::inRandomOrder()->limit(5)->get();
        if(count($data) > 0){
            return response()->json([
                'status'    => true,
                'data'      => $data
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'There is no ads'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad=new Advertising();
        $ad->title=$request->title;
        $ad->img=$request->img;
        $ad->messager = $request->messager;
        $ad->msgstatus=$request->msgstatus;
        $ad->link = $request->link;
        $ad->save();
        return $ad;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ads = Advertising::inRandomOrder()->first();
        if($ads){
            return response()->json([
                'status'    => true,
                'data'      => $ads
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'There is no ads'
            ]);
        }
    }
    public function update(Request $request)
    {
        $ad= Advertising::find($request->id);
        $ad->title = $request->title;
        $ad->img=$request->img;
        $ad->messager = $request->messager;
        $ad->msgstatus=$request->msgstatus;
        $ad->link = $request->link;
        if($ad->update()){
            return response()->json([
                'status'    => true,
                'message'   => 'Success'
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'Fail'
            ]);

        }
        // if ($ad->update()) {
        //     return redirect()->route('ad.index');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ad =Advertising::find($request->id);
        if ($ad->delete()) {
            return response()->json([
                'status'    => true,
                'message'   => 'Success'
            ]);

        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Fail to delete'
            ]);

        }
    }
}
