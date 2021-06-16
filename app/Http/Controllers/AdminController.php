<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function category()
    {
    	$data['category']=Catagory::orderBy('id','desc')->get()->toArray();
    	return view('admin.category',$data);
    }

    public function add_new_category(Request $req)
    {
    	$validator=Validator::make($req->all(),[
    		'name'=>'required'
    	]);

    	if($validator->passes())
    	{
    		$cat_obj=new Catagory();
    		$cat_obj->name=$req->name;
    		$cat_obj->status=1;
    		$cat_obj->save();
    		$arr=array('status'=>'true','message'=>'Category Successfully Added','reload'=>url('/admin'));
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}

    	echo json_encode($arr);
    }


    public function delete_category($id)
    {
    	$cat=Catagory::where('id',$id)->get()->first();
    	$cat->delete();
    	return redirect(url('/admin'));
    }

    public function edit_category($id){
    	$category=Catagory::where('id',$id)->get()->first();
    	return view('admin.edit_category',['category'=>$category]);
    }

    public function update_category(Request $req)
    {
    	$category=Catagory::where('id',$req->id)->get()->first();
    	$category->name=$req->name;
    	$category->update();
    	echo json_encode(array('status'=>'true','message'=>'Category Successfully Updated!','reload'=>url('/admin')));
    }


    public function category_status_update($id){
    	$cat=Catagory::where('id',$id)->get()->first();
    	if($cat->status==1)
    	{
    		$status=0;
    	}
    	else
    	{
    		$status=1;
    	}

    	$cat_1=Catagory::where('id',$id)->get()->first();
    	$cat_1->status=$status;
    	$cat_1->update();

    }


    public function products()
    {
    	$data['category']=Catagory::where('status','1')->get()->toArray();

    	$data['products']=Product::
    	select(['products.*','catagories.name as cat_name'])
    	->orderBy('id','desc')
    	->join('catagories','products.category','=','catagories.id')
    	->get()->toArray();

    	return view('admin.products',$data);
    }


    public function add_new_product(Request $req){
    	$validator=Validator::make($req->all(),[
    	    'product_name'=>'required',
    		'price'=>'required',
    		'product_category'=>'required',
    	]);

    	if($validator->passes())
    	{
    		$pro_obj=new Product();
    		$pro_obj->product_name=$req->product_name;
    		$pro_obj->category=$req->product_category;  		
    		$pro_obj->price=$req->price;
    		$pro_obj->description=$req->description;
    		$pro_obj->status=1;
    		$pro_obj->save();
    		$arr=array('status'=>'true','message'=>'Product Successfully Added','reload'=>url('admin/products'));
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}

    	echo json_encode($arr);
    }


 	public function delete_product($id)
    {
    	$pro=Product::where('id',$id)->get()->first();
    	$pro->delete();
    	return redirect(url('admin/products'));
    }


    public function edit_product($id){
    	$data['products']=Product::where('id',$id)->get()->first();
    	$data['category']=Catagory::orderBy('id','desc')->where('status','1')->get()->toArray();
    	return view('admin.edit_product',$data);
    }


    public function update_product(Request $req)
    {
    	$pro=Product::where('id',$req->id)->get()->first();
    	$pro->product_name=$req->product_name;
    	$pro->description=$req->description;
    	$pro->category=$req->product_category;
    	$pro->update();
    	echo json_encode(array('status'=>'true','message'=>'Product Successfully Updated!','reload'=>url('admin/products')));
    }


    public function product_status_update($id)
    {
    	$pro=Product::where('id',$id)->get()->first();
    	if($pro->status==1)
    	{
    		$status=0;
    	}
    	else
    	{
    		$status=1;
    	}

    	$pro_1=Product::where('id',$id)->get()->first();
    	$pro_1->status=$status;
    	$pro_1->update();

    }
}
