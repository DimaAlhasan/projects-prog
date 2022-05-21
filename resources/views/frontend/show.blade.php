@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
              <h2>  {{__('Frontend/frontend.invoice',['invoice_number'=>$invoice->invoice_number])}}</h2>
              <a href="{{route('fatora.index')}}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i>{{__('Frontend/frontend.back_to_invoice')}}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>{{__('Frontend/frontend.Customer_name')}}</th>
                            <td>{{$invoice->customer_name}}</td>
                            <th>{{__('Frontend/frontend.Customer_email')}}</th>
                            <td>{{$invoice->customer_email}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Frontend/frontend.Customer_mobile')}}</th>
                            <td>{{$invoice->customer_mobile}}</td>
                            <th>{{__('Frontend/frontend.Company_name')}}</th>
                            <td>{{$invoice->company_name}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Frontend/frontend.Invoice_number')}}</th>
                            <td>{{$invoice->invoice_number}}</td>
                            <th>{{__('Frontend/frontend.Invoice_date')}}</th>
                            <td>{{$invoice->invoice_date}}</td>
                        </tr>
                    </table>
                    <h3>{{__('Frontend/frontend.invoice_details')}}</h3>

                    <table class="table">
<thead>
    <tr>
<th></th>
<th>{{__('Frontend/frontend.Product_name')}}</th>
<th>{{__('Frontend/frontend.Unit')}}</th>
<th>{{__('Frontend/frontend.Quantity')}}</th>
<th>{{__('Frontend/frontend.Unit price')}}</th>
<th>{{__('Frontend/frontend.Subtotal')}}</th>

    </tr>
</thead>
<tbody>
    @foreach ($invoice->details as $item)
    <tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->product_name}}</td>
<td>{{$item->unitText()}}</td>
<td>{{$item->quantity}}</td>
<td>{{$item->unit_price}}</td>
<td>{{$item->row_sub_total}}</td>
    </tr>
        
    @endforeach
</tbody>
<tfoot>
    <tr>
<td colspan="3"></td>
<th colspan="2">{{__('Frontend/frontend.Sub_Total')}}</th>
<td>{{$invoice->sub_total}}</td>

    </tr>
    <tr>
        <td colspan="3"></td>
        <th colspan="2">{{__('Frontend/frontend.Discount')}}</th>
        <td>{{$invoice->discountResult()}}</td>
        
            </tr>
            <tr>
                <td colspan="3"></td>
                <th colspan="2">{{__('Frontend/frontend.Vat')}}</th>
                <td>{{$invoice->vat_value}}</td>
                
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <th colspan="2">{{__('Frontend/frontend.Shipping')}}</th>
                        <td>{{$invoice->shipping}}</td>
                        
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{__('Frontend/frontend.Total Due')}}</th>
                                <td>{{$invoice->total_due}}</td>
                                
                                    </tr>
</tfoot>



                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection 