<?php

namespace App\Http\Controllers;

use App\Models\HighLights;
use App\Models\HighLink;
use App\Models\Relinks;
use Illuminate\Http\Request;

class HightLightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HighLights::orderBy('id','desc')->get();
        if(count($data) > 0){
            return response()->json([
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
        $hlights=new HighLights();
        $hlights->league_name=$request->league_name;
        $hlights->home_name=$request->home_name;
        $hlights->home_logo=$request->home_logo;
        $hlights->away_name=$request->away_name;
        $hlights->away_logo=$request->away_logo;
        $hlights->date=$request->date;
        $hlights->time=$request->time;
        $hlights->save();
        return $hlights;
    }
    public function add(Request $request)
    {
        $links=new HighLink();
        $links->high_lights_id=$request->high_lights_id;
        $links->name=$request->name;
        $links->link=$request->link;
        $links->save();
        return $links;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = HighLights::where('id', $request->id)->with('links')->first();
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

    public function update(Request $request)
    {
        $hlights= HighLights::find($request->id);
        $hlights->league_name=$request->league_name;
        $hlights->home_name=$request->home_name;
        $hlights->home_logo=$request->home_logo;
        $hlights->away_name=$request->away_name;
        $hlights->away_logo=$request->away_logo;
        $hlights->date=$request->date;
        $hlights->time=$request->time;
        if($hlights->update()){
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

    public function linkupdate(Request $request)
    {
        $links =HighLink::find($request->id);
        $links->high_lights_id=$request->high_lights_id;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Hightdestroy(Request $request)
    {
        $hlinks =HighLink::where('high_lights_id',$request->high_lights_id);
        if ($hlinks->delete()) {
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
        $livedel =HighLights::find($request->id);
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
