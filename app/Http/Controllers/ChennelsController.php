<?php

namespace App\Http\Controllers;

use App\Models\Chennels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;

class ChennelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Chennels::orderBy('id','desc')->get();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chennels=new Chennels();
        $chennels->title=$request->title;
        $chennels->img=$request->img;
        $chennels->link=$request->link;
        $chennels->save();
        return $chennels;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $chennelsupdate= Chennels::find($request->id);
        $chennelsupdate->title=$request->title;
        $chennelsupdate->img=$request->img;
        $chennelsupdate->link=$request->link;
        $chennelsupdate->telegram=$request->telegram;
        if($chennelsupdate->update()){
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
    public function destroy(Request $request)
    {
        $chandel= Chennels::find($request->id);
        if ($chandel->delete()) {
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
