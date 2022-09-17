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
    //API
    public function getAll(){
        $customer=Customer::all();
        return $customer;
    }
    public function saveCustomer(Request $request){
        if($request->control=='form' || $request->control=='api') {
            //Validaciones del formulario
            $data = request()->validate([
                'name' => 'required|max:13',
                'address' => 'required|max:75',
                'phone_number' => 'required|max:75',
                'id_category' => 'required|max:75',
            ], [
                'name.required' => 'El campo codigo no debe estar vacio.',
                'address.required' => 'El campo nombre no debe estar vacio.',
                'phone_number.required' => 'El campo descripcion no debe estar vacio.',
            ]); // termina el bloque de validaciones

            try {
                //Guardar el producto
                $customer = Customer::create([
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'phone_number' => $data['phone_number'],
                    'id_category' => $data['id_category']
                ]);

            } catch (QueryException $queryException) { //capturamos el erro en el catch
                return redirect()->route('Customer.customer-list')->with('warning', 'Ocurrio un error al registrar el producto. ');
            }
        }
        if($request->control=='form'){
            return redirect()->route('Customer.customer-list')->with('success', 'Registro realizado exitosamente');
        }elseif($request->control=='api'){
            return response()->json([
                'name' => 'Guardado Exitosamente',
                'address' => 'Guardado Exitosamente',
                'phone_number' => 'Guardado Exitosamente',
                'id_category' => 'Guardado Exitosamente',
            ]);
        }
    }

    public function deleteCustomer($id){
        $customer= $this->getCustomer($id);
        $customer->delete();
        return $customer;
    }
    public function editCustomer($id, Request $request){
        $customer = $this->getCustomer($id);
        $customer->fill($request->all())->save();
        return $customer;
    }
    public function getCustomer($id){
        $customer=Customer::find($id);
        return $customer;
    }

}
