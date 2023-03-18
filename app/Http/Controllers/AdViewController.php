<?php

namespace App\Http\Controllers;

use App\Models\AdView;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function GuzzleHttp\Promise\all;

class AdViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adview=AdView::all();
        if (count($adview)>0) {
            return response()->json(
                [
                    'status'    => true,
                    'data'   => $adview

                ]
            );
        } else {
            return response()->json([
                'status'    => false,
                'data'   => 'There is no data'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adviews=new AdView();
        $adviews->directlink=$request->directlink;
        $adviews->appopenmessenger=$request->appopenmessenger;
        $adviews->appopenlink=$request->appopenlink;
        $adviews->appopenbanner=$request->appopenbanner;

        $adviews->bannermessenger=$request->bannermessenger;
        $adviews->bannerlink=$request->bannerlink;
        $adviews->bannerimg=$request->bannerimg;
        $adviews->inter=$request->inter;
        $adviews->img=$request->img;
        $adviews->messenger=$request->messenger;
        $adviews->link=$request->link;

        $adviews->hlbannerimg=$request->hlbannerimg;
        $adviews->hlbannerlink=$request->hlbannerlink;
        $adviews->hlbannermessenger=$request->hlbannermessenger;
        $adviews->hlinter=$request->hlinter;
        $adviews->hlimg=$request->hlimg;
        $adviews->hlmessenger=$request->hlmessenger;
        $adviews->hllink=$request->hllink;
        $adviews->videoad=$request->videoad;
        $adviews->testad=$request->testad;
        $adviews->test_no=$request->test_no;
        $adviews->imglink=$request->imglink;
        $adviews->message=$request->message;
        $adviews->messagelink=$request->messagelink;
        $adviews->save();
        return $adviews;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function show(AdView $adView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function edit(AdView $adView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $adresult = AdView::find($request->id);
        $adresult->directlink=$request->directlink;
        $adresult->appopenmessenger=$request->appopenmessenger;
        $adresult->appopenlink=$request->appopenlink;
        $adresult->appopenbanner=$request->appopenbanner;

        $adresult->bannermessenger=$request->bannermessenger;
        $adresult->bannerlink=$request->bannerlink;
        $adresult->bannerimg=$request->bannerimg;
        $adresult->inter=$request->inter;
        $adresult->img=$request->img;
        $adresult->messenger=$request->messenger;
        $adresult->link=$request->link;

        $adresult->hlbannerimg=$request->hlbannerimg;
        $adresult->hlbannerlink=$request->hlbannerlink;
        $adresult->hlbannermessenger=$request->hlbannermessenger;
        $adresult->hlinter=$request->hlinter;
        $adresult->hlimg=$request->hlimg;
        $adresult->hlmessenger=$request->hlmessenger;
        $adresult->hllink=$request->hllink;
        $adresult->videoad=$request->videoad;
        $adresult->testad=$request->testad;
        $adresult->test_no=$request->test_no;
        $adresult->imglink=$request->imglink;
        $adresult->message=$request->message;
        $adresult->messagelink=$request->messagelink;
        if($adresult->update()){
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
     * @param  \App\Models\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $addel =AdView::find($request->id);
        if ($addel->delete()) {
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
