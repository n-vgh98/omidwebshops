<?php

namespace App\Http\Controllers;

use App\OfferOfDay;
use Illuminate\Http\Request;

class OfferOfDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OfferOfDay $offerOfDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferOfDay $offerOfDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferOfDay $offerOfDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferOfDay $offerOfDay)
    {
        //
    }
    public function add($id)
    {
        return view('addofferofday',['id' => $id]);
    }
    public function saveofferofday(Request $request)
    {
        if (isset($request->image) && isset($request->productid)) {
            $obj = new OfferOfDay();
            $img = $request->image;
            $obj->product_id = $request->productid;
            $foo = new Upload($img);
            if ($foo->uploaded) {

                // resized to 200px wide
                //$foo->file_new_name_body = 'image_resized' . time();
                $file = $img->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $foo->file_new_name_body = $filename . time();
                $path = $foo->file_new_name_body . '.png';
                $foo->image_resize = true;
                $foo->image_convert = 'png';
                $foo->image_y = 200;
                //  $foo->image_ratio_x = true;
                // $foo->image_x = 200;
                $foo->process('storage/offerofday');
                if ($foo->processed) {
                    $obj->image = 'offerofday/' . $path;
                    $obj->save();
                    return redirect()->route("voyager.products.index")->with([
                        'message' => __('generic.most_populars')." " . __('voyager::generic.successfully_added_new'),
                        'alert-type' => 'success',
                    ]);


                } else {
                    return redirect()->back()->withErrors(['file_error' => $foo->error]);

                }
            }

        }
    }

}
