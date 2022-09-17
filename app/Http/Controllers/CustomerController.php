<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
   public function index()
    {
        $datos = DB::table('customer as cu')
        ->join('category as ca','cu.id_category','=','ca.id_category')
        ->select('cu.id_customer','cu.name','cu.address','cu.phone_number','cu.updated_at','cu.created_at','ca.description')->get();
        return view('Customer.customer-list', compact('datos'));
    }
    public function index2()
    {
        $customers = Customer::all(['id','name','address','phone_number']);
        return response()->json($customers);
    }
    public function create()
    {
        $datos = Category::all();
        return view('Customer.create-customer',compact('datos'));
    }
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->post('name');
        $customer->address = $request->post('address');
        $customer->phone_number = $request->post('phone_number');
        $customer->id_category = $request->post('id_category');
        $customer->save();
        return redirect()->route("customers.index")->with("Success");
    }
    public function show($id)
    {

        $customer = Customer::find($id);
        $datos = Category::all();
        return view('Customer.eliminar-customer',compact('customer','datos'));
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $datos = Category::all();
        return view('Customer.edit-customer',compact('customer','datos'));
    }
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->post('name');
        $customer->address = $request->post('address');
        $customer->phone_number = $request->post('phone_number');
        $customer->id_category = $request->post('id_category');
        $customer->save();
        return redirect()->route("customers.index")->with("Success");
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route("customers.index")->with("Success");
    }
}
