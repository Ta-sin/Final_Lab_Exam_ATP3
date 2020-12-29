<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use App\pro;
use PDF;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {     
        return view('employee.index');

    }
    /*
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('employee.createProduct');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ProductStore(Request $req)
    {


             $this->validate($req, [
                'pname' => 'required|min:3',
                'quantity'=> 'required',
                'price' => 'required'
            ])->validate();

       
                $pro = new pro();
                $pro->pname          = $req->pname;
                $pro->quantity       = $req->quantity;
                $pro->price          = $req->price;
               
              
                if($pro->save()){
                    //return redirect()->route('admin.userlist');
                      return view('employee.index');
                }else{
                    return back();
                }
    }
    /**
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function ProductList()
    {
          $Products  = pro::all();
        return view('employee.ProductList')->with('pros', $Products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Products = pro::find($id);       
        return view('employee.ProductEdit', $Products);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProduct($id, Request $req)
    {
         $pro = pro::find($id); 
        $pro->pname     = $req->pname;
        $pro->quantity     = $req->quantity;
        $pro->price         = $req->price;
        $pro->save();

        return view('employee.index');
    }

     public function productDeleted($id){
        $pro = pro::find($id);       
        return view('employee.deleteProduct')/*->with('user', $user)*/;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id)
    {
         $pro = pro::find($id) -> delete();

         //return redirect()->route('employee.ProductEdit');
          return view('employee.index');
    }

/*************************************PDF Generator**************************************/

    public function get_product_data($id)
    {
        $Products = pro::find($id);       
        return $Products;
    }

    public function pdf($id)
    {
          $Products = pro::find($id); 
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($this->convert_product_data_to_html($id));
         return $pdf->stream( $Products->pname.".pdf");
    }

    public function convert_product_data_to_html($id)
    {
   
         $product_data = $this->get_product_data($id);

          $output = '
          <h2>Product Data</h2><br><hr><br>
    <table width="70%" style="border-collapse: collapse; border: 1px; ">
        <tr style="font-falimy:arial; font-size:20px">
            <td>P Name</td>
            <td>Quantity</td>
            <td>Price</td>
        </tr>';

    $output .=' 
        <tr style="color:blue">
            <td><br>'.$product_data->pname.'</td>
            <td><br>'.$product_data->quantity.'</td>
            <td><br>'.$product_data->price.'</td>
        </tr>';

    $output .= '</table>';

    return $output;

    }

}
