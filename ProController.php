<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\pro;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = pro::all();
  
        return view('products.index',compact('products'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function create()
    {
       return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'product_name'=>'required',
            'product_details'=>'required',
            'product_price'=>'required',
            'product_qty'=>'required',           
            'product_image'=>'required'

        ]);

      

        $file123 = $request->file('product_image');
        $orignal_file = $file123->getClientOriginalName();     

        Storage::disk('public')->put($orignal_file, File::get($file123));

        $productq = new pro([
            'product_name'=>$request->get('product_name'),
            'product_details'=>$request->get('product_details'),
            'product_price'=>$request->get('product_price'),
            'product_qty'=>$request->get('product_qty'),           
            'product_image'=> $orignal_file
        ]);

        $productq->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function show(pro $pro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function edit(pro $pro,$id)
    {
       $productarray = pro::where('product_id', $id)->first();
        return view('products.edit', compact('productarray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pro $pro,$id)
    {
         $request->validate([
            'product_name'=>'required',
            'product_details'=>'required',
            'product_price'=>'required',
            'product_qty'=>'required',
            'subcat_id'=>'required',
            'product_image'=>'required'

        ]);

     

        $file123 = $request->file('product_image');
        $orignal_file = $file123->getClientOriginalName();
        Storage::disk('public')->put($orignal_file, File::get($file123));


        $productarray = pro::where('product_id', $id)->first();
        $productarray->product_name = $request->get('product_name');
        $productarray->product_details = $request->get('product_details');
        $productarray->product_price = $request->get('product_price');
        $productarray->product_qty = $request->get('product_qty');
        $productarray->subcat_id = $request->get('subcat_id');
        $productarray->product_image = $orignal_file;

        $productarray->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function destroy(pro $pro,$id)
    {
      
       $productarray = pro::where('product_id', $id)->first();
         
        
        pro::where('product_id', '=', $id)->delete();

        return redirect('/products');
    }
}
