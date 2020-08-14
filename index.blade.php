hii
@extends('layouts.admin')



        @section('content')

        @if (session()->get('success'))
    {{session()->get('success')}}
    
@endif
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="tables">
                        <h2 class="title1">Database Table</h2>
                        <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
                        <h4>Product Table</h4>
                        <table id='myTable' class='table table-hover'>
                        
                        

<thead>
    <tr>
        <th> ID </th>
        <th> Product Name </th>
        <th> Product Details </th>
        <th> Product Price </th>
        <th> Product Quantity </th>
        <th> product images </th>
        <th> Action </th>
    </tr>
</thead>
<tbody>

    @foreach($products as $product)

    <tr>
        <td>{{$product->product_id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->product_details}}</td>
        <td>{{$product->product_price}}</td>
        <td>{{$product->product_qty}}</td>        
        <td><img src="{{url('../storage/app/public/'.$product->product_image) }}" alt='image' width='50'></td>
        <td><button type="submit"><a href="{{ route('products.edit',$product->product_id)}}"> Edit </a></button> | 
        
            <form action="{{ route('products.destroy', $product->product_id)}}" method="post" >
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
                        </div>

                    </div>
                </div>
            </div>

            @endsection
            
