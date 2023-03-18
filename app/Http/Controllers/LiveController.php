<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Live;
use App\Models\LiveLink;
use Symfony\Contracts\Service\Attribute\Required;

class LiveController extends Controller
{

    public function index()
    {
        $data = Live::orderBy('id','desc')->get();
        if(count($data) > 0){
            return  response()->json([
                'status'    => true,
                'data'      => $data
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'There is no data'
            ]);
        }
    }

    public function store(Request $request)
    {
        $lives=new Live();
        $lives->league_name=$request->league_name;
        $lives->home_name=$request->home_name;
        $lives->home_logo=$request->home_logo;
        $lives->away_name=$request->away_name;
        $lives->away_logo=$request->away_logo;
        $lives->date=$request->date;
        $lives->time=$request->time;
        $lives->is_live=$request->is_live;
        $lives->save();
        return $lives;
    }
    public function add(Request $request){
        $links=new LiveLink();
        $links->live_id=$request->live_id;
        $links->name=$request->name;
        $links->link=$request->link;
        $links->save();
        return $links;
    }

    public function show(Request $request)
    {
        $data = Live::where('id', $request->id)->with('links')->first();
        if($data){
            return response()->json([
                'status'    => true,
                'data'      => $data,
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'There is no Live'
            ]);
        }
    }

    public function linkupdate(Request $request)
    {
        $links =LiveLink::find($request->id);
        $links->live_id=$request->live_id;
        $links->name=$request->name;
        $links->link=$request->link;
        if($links->update()){
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lives= Live::find($request->id);
        $lives->league_name=$request->league_name;
        $lives->home_name=$request->home_name;
        $lives->home_logo=$request->home_logo;
        $lives->away_name=$request->away_name;
        $lives->away_logo=$request->away_logo;
        $lives->date=$request->date;
        $lives->time=$request->time;
        $lives->is_live=$request->is_live;
        if($lives->update()){
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function linkdestroy(Request $request)
    {
        $links =LiveLink::where('live_id',$request->live_id);
        if ($links->delete()) {
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

    public function destroy(Request $request)
    {
        $livedel =Live::find($request->id);
        if ($livedel->delete()) {
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
