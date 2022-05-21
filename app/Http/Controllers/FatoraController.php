<?php

namespace App\Http\Controllers;

use App\Invoice;

use Illuminate\Http\Request;

class FatoraController extends Controller
{






    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices =Invoice::orderBy('id','desc')->paginate(10);


       return view('frontend.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        return view('frontend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
       $data ['customer_mobile']=$request->customer_mobile;
       $data ['company_name']=$request->company_name;
       $data ['invoice_number']=$request->invoice_number;
       $data['invoice_date']=$request->invoice_date;
       $data['sub_total']=$request->sub_total;
       $data['discount_type']=$request->discount_type;
       $data['discount_value']=$request->discount_value;
       $data['vat_value']=$request->vat_value;
       $data['shipping']=$request->shipping;
       $data['total_due']=$request->total_due;

       $invoice=Invoice::create($data);
       $details_list=[];

       for($i=0;$i<count($request->product_name);$i++){
        $details_list[$i]['product_name']=$request->product_name[$i];
        $details_list[$i]['unit']=$request->unit[$i];
        $details_list[$i]['quantity']=$request->quantity[$i];
        $details_list[$i]['unit_price']=$request->unit_price[$i];
        $details_list[$i]['row_sub_total']=$request->row_sub_total[$i];
       }
       
       $details=$invoice->details()->createMany($details_list);
       if($details){
return redirect()->back()->with([

    'message'=>__('Frontend/frontend.created_successfully'),
    'alert-type'=>'success'
]);


       }else{

        return redirect()->back()->with([

            'message'=>__('Frontend/frontend.created_failed'),
            'alert-type'=>'danger'
        ]);


       }

    }


















        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($id)
    {
        $invoice=Invoice::findOrFail($id);
        return view('frontend.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice=Invoice::findOrFail($id);
        return view('frontend.edit',compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $invoice=Invoice::whereId($id)->first();
        
        
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
       $data ['customer_mobile']=$request->customer_mobile;
       $data ['company_name']=$request->company_name;
       $data ['invoice_number']=$request->invoice_number;
       $data['invoice_date']=$request->invoice_date;
       $data['sub_total']=$request->sub_total;
       $data['discount_type']=$request->discount_type;
       $data['discount_value']=$request->discount_value;
       $data['vat_value']=$request->vat_value;
       $data['shipping']=$request->shipping;
       $data['total_due']=$request->total_due;

     $invoice->update($data);
     $invoice->details()->delete();
       $details_list=[];

       for($i=0;$i<count($request->product_name);$i++){
        $details_list[$i]['product_name']=$request->product_name[$i];
        $details_list[$i]['unit']=$request->unit[$i];
        $details_list[$i]['quantity']=$request->quantity[$i];
        $details_list[$i]['unit_price']=$request->unit_price[$i];
        $details_list[$i]['row_sub_total']=$request->row_sub_total[$i];
       }
       
       $details=$invoice->details()->createMany($details_list);
       if($details){
return redirect()->back()->with([

    'message'=>__('Frontend/frontend.updated_successfully'),
    'alert-type'=>'success'
]);


       }else{

        return redirect()->back()->with([

            'message'=>__('Frontend/frontend.updated_failed'),
            'alert-type'=>'danger'
        ]);


       }

    }













        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $invoice=Invoice::findOrFail($id);
        if($invoice){
    $invoice->delete();

     return redirect()->route('fatora.index')->with([
     'message'=>__('Frontend/frontend.deleted_successfully'),

     'alert-type'=>'success'




     ]);

        }else{

            return redirect()->route('fatora.index')->with([
                'message'=>__('Frontend/frontend.deleted_failed'),
           
                'alert-type'=>'danger'
           
           
           
           
                ]);


        }
    }
}
