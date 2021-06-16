@extends('layouts.app')
  @section('title','Edit Product')
  
  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                <form action="{{ url('/admin/update_product') }}" class="database_operation">
                  @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Name</label>
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <input type="text" value="{{ $products->product_name }}" name="product_name" placeholder="Enter Product Name" class="form-control" required="required">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Product Details</label>
                        <textarea name="description" cols="10" rows="2" class="form-control">{{$products->description}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Select Product Category</label>
                        <select class="form-control" name="product_category" required="required">
                          <option value="">Select</option>
                          @foreach($category as $cat)
                            <option <?php if($products->category==$cat['id']){ echo "selected"; }?> value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                          @endforeach                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Price</label>
                        <input type="text" value="{{ $products->price }}" name="price" placeholder="Enter Product Price" class="form-control" required="required">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  @endsection