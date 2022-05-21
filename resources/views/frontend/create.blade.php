@extends('layouts.app')

@section('style')


<link rel="stylesheet" href="{{asset('frontend/css/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/pickadate/classic.date.css')}}">

@if (config('app.locale')=='ar')
<link rel="stylesheet" href="{{asset('frontend/css/pickadate/rtl.css')}}">
@endif

<style>
    form.form label.error,label.error{

        color:red;
        font-style: italic;
    }
</style>


@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
<div class="card-header">
<h2>{{__('Frontend/frontend.Invoice')}}</h2>


</div>
<div class="card-body">

    <form action="{{route('fatora.store')}}" method="post" class="form">
        @csrf

        <div class="row">

            <div class="col-4">

                <div class="form-group">
                    <label for="customer_name"> {{__('Frontend/frontend.Customer_name')}}</label>
                    <input type="text" name="customer_name" class="form-control" >
                    @error('customer_name')<span class="help-block text-danger">{{$message}}</span>@enderror
                </div>


            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="customer_email">{{__('Frontend/frontend.Customer_email')}}</label>
                    <input type="text" name="customer_email" class="form-control" >
                    @error('customer_email')<span class="help-block text-danger">{{$message}}</span>@enderror

                </div>
            </div>
            <div class="col-4">


            <div class="form-group">
                  <label for="customer_mobile">{{__('Frontend/frontend.Customer_mobile')}}</label>
                  <input type="text" name="customer_mobile" class="form-control" >
                  @error('customer_mobile')<span class="help-block text-danger">{{$message}}</span>@enderror
                      
                 
                </div>

            </div>
        </div>


        
        <div class="row">

            <div class="col-4">

                <div class="form-group">
                    <label for="company_name">{{__('Frontend/frontend.Company_name')}}</label>
                    <input type="text" name="company_name" class="form-control" >
                    @error('company_name')<span class="help-block text-danger">{{$message}}</span>@enderror
                </div>


            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="invoice_number">{{__('Frontend/frontend.Invoice_number')}}</label>
                    <input type="text" name="invoice_number" class="form-control" >
                    @error('invoice_number')<span class="help-block text-danger">{{$message}}</span>@enderror

                </div>
            </div>
            <div class="col-4">


            <div class="form-group">
                  <label for="invoice_date">{{__('Frontend/frontend.Invoice_date')}}</label>
                  <input type="text" name="invoice_date" class="form-control pickdate" >
                  @error('invoice_date')<span class="help-block text-danger">{{$message}}</span>@enderror
                      
                 
                </div>

            </div>
        </div>

        <div class="table-responsive">

           <table class="table" id="invoice_details">
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
    <tr class="cloning_row" id="0">
<td>#</td>
<td>

    <input type="text" name="product_name[0]" id="product_name" class="product_name form-control">
</td>
<td>

<select name="unit[0]" id="unit" class="unit form-control">

    <option></option>
    <option value="piece">{{__('Frontend/frontend.Piece')}}</option>
    <option value="g">{{__('Frontend/frontend.gram')}}</option>
    <option value="kg">{{__('Frontend/frontend.Kilo Gram')}}</option>
</select>
@error('unit')<span class="help-block text-danger">{{$message}}</span>@enderror

</td>
<td>
    <input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
    @error('quantity')<span class="help-block text-danger">{{$message}}</span>@enderror 
</td>
<td>

    <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">
    @error('unit_price')<span class="help-block text-danger">{{$message}}</span>@enderror
</td>
<td>
    <input type="number"  step ="0.01" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control"  readonly="readonly">

    @error('row_sub_total')<span class="help-block text-danger">{{$message}}</span>@enderror
</td>
    </tr>
</tbody>

<tfoot>

    <tr>
<td colspan="6">
    <button type="button" class="btn_add btn btn-primary">{{__('Frontend/frontend.Add another product')}}</button>




</td>



    </tr>

    <tr>
        <td colspan="3"></td>
        <td colspan="2">{{__('Frontend/frontend.Sub_Total')}}</td>
        <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form control" readonly="readonly"></td>


    </tr>
    <tr>
        <td colspan="3"></td>
        <td colspan="2">{{__('Frontend/frontend.Discount')}}</td>
        <td>
            <div class="input-group mb-3">
                <select name="discount_type" id="discount_type" class="discount_type custom-select">
                    <option value="fixed">{{__('Frontend/frontend.SR')}}</option>
                    <option value="percentage">{{__('Frontend/frontend.Percentage')}}</option>
                </select>
                <div class="input-group-append">
                    <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                </div>
            </div>
        </td>
        
    </tr>

    <tr>
        <td colspan="3"></td>
        <td colspan="2">{{__('Frontend/frontend.Vat')}}</td>
        <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value  form control" readonly="readonly"></td>


    </tr>
    <tr>
        <td colspan="3"></td>
        <td colspan="2">{{__('Frontend/frontend.Shipping')}}</td>
        <td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping  form control"></td>


    </tr>


    <tr>
        <td colspan="3"></td>
        <td colspan="2">{{__('Frontend/frontend.Total Due')}}</td>
        <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due  form control" readonly="readonly"></td>
       
          
        <div class="text-right pt-3">
            
            <button type="submit" name="save" class="btn btn-primary">{{__('Frontend/frontend.Save')}}</button>
            </div>
            
            
        


    </tr>
   
</tfoot>










           </table>
        </div>
    </form>
</div>

        </div>


</div>

</div>

@endsection

@section('script')

<script src="{{asset('frontend/js/form-validation/additional-methods.min.js')}}"></script>
<script src="{{asset('frontend/js/form-validation/jquery.form.js')}}"></script>
<script src="{{asset('frontend/js/form-validation/jquery.validate.min.js')}}"></script>

<script src="{{asset('frontend/js/fontawesome/pickadate/picker.date.js')}}"></script>
<script src="{{asset('frontend/js/fontawesome/pickadate/picker.js')}}"></script>


@if (config('app.locale')=='ar')
<script src="{{asset('frontend/js/form-validation/messages_ar.js')}}"></script>
<script src="{{asset('frontend/js/fontawesome/pickadate/ar.js')}}"></script>
@endif

    
<script src="{{asset('frontend/js/custom.js')}}"></script>

@endsection