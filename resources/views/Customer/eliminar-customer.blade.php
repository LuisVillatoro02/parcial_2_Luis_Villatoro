@extends('layout.plantilla')
@section('TituloPagina','Delete Customers')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/create-customer.css') }}">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <center>
            <div class="alert alert-danger" role="alert">
                <h1>Desea Eliminar</h1>
            </div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Create At</th>
                    <th scope="col">Update At</th>
                    <th scope="col">Category</th>
                  </tr>
                </thead>
                <tbody> 
                    
                      <tr>
                        <td>{{ $customer->id_customer }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>{{ $customer->id_category}}</td>
                    </tr>  
                                  
                </tbody>
              </table>
              <br><br><br><br>
              <form action="{{ route('customers.destroy',$customer->id_customer) }}" method="POST">
                @csrf
                @method('DELETE')
                    <div class="navigation">
                        <ul>
                            <li class="list active">
                                    <button class="btn btn-sucess"><span class="icon"><ion-icon name="checkmark-outline"></ion-icon></span></button>
                                    
                            </li>
                            <li class="list">
                                <a class="btn btn-infor" href="{{ route('customers.index') }}">
                                    <span class="icon"><ion-icon name="close-outline"></ion-icon></span>
                                </a>
                            </li>
                        </ul>
                    </div>
            </form>
    </center>
    </div>
    <center>
        <footer>
           <div class="">
             <div class="container text-center">
               <p class="text-muted mb-0 py-2">© 2019 LuisVillatoro02 All rights reserved.</p>
             </div>
           </div>
         </footer>
   </center>
        <script>
            const list = document.querySelectorAll('.list');
            function activeLink(){
                list.forEach((item) =>
                item.classList.remove('active'));
                this.classList.add('active');
            }
            list.forEach((item) =>
            item.addEventListener('click',activeLink));

        </script>