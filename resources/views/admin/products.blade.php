@extends('layouts.app')
  @section('title','Products')
  
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
              <div class="card-header">
                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $key => $pro)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $pro['product_name'] }}</td>
                        <td>{{ $pro['cat_name'] }}</td>
                        <td>{{ $pro['description'] }}</td>
                        <td>{{ $pro['price'] }}</td>
                        <td>
                          <input class="product_status" data-id="{{ $pro['id'] }}" <?php if($pro['status']==1){echo "checked";}?> type="checkbox" name="status">
                        </td>
                        <td>
                          <a href="{{ url('admin/edit_product/'.$pro['id']) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('admin/delete_product/'.$pro['id']) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                   <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/admin/add_new_product') }}" class="database_operation">
            @csrf
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Enter Name</label>
                  <input type="text" name="product_name" placeholder="Enter Product Name" class="form-control" required="required">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Product Details</label>
                  <textarea name="description" class="form-control" cols="10" rows="2"></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Select Product Category</label>
                  <select class="form-control" name="product_category" required="required">
                    <option value="">Select</option>
                    @foreach($category as $cat)
                      <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Enter Price</label>
                  <input type="text" name="price" placeholder="Enter Product Price" class="form-control" required="required">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <button class="btn btn-primary">Add</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      
    </div>
    </div>  
  
  @endsection