@extends('layouts.admin')
 @section('content')
       
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="forms">
                        <h2 class="title1">Product Form</h2>

                        <div class=" form-grids row form-grids-right">
                            <div class="widget-shadow " data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Add Product:</h4>
                                </div>
                                <div class="form-body">
                                    <form method="post" action="{{ route('products.store')}}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Name:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="text" class="form-control" id="inputEmail3" name='product_name' placeholder="Product Name" required>
                                            </div> 
                                        </div> 
                                        <div class="form-group">
                                            <label for="txtarea1" class="col-sm-2 control-label">Product Details:</label>
                                            <div class="col-sm-9">
                                                <textarea name='product_details' class="form-control" id="inputEmail3" placeholder="Product Detail" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Price:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="number" class="form-control" id="inputEmail3" name='product_price' placeholder="Enter Price" required>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="number" class="form-control" id="inputEmail3" name="product_qty" placeholder="Enter Quantity" required>
                                            </div> 
                                        </div>
                                   
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Image:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="file" class="form-control" id="inputEmail3" name="product_image" required>
                                            </div> 
                                        </div> 
                                        <div class="col-sm-offset-2"> 
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div> 
                                    </form> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            @endsection
