@extends('layout.plantilla')
@section('TituloPagina','Customer List')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/list-customer.css') }}">
        <br><br>
        <center>
        <div class="navigation">
            <ul>
                
                <li class="list active">
                    <a href="/">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="{{ route('customers.create') }}">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="text">Add Customer</span>
                    </a>
                </li>
            </ul>
        </div>
    </center>
    <div class="container">
        <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col"><ion-icon name="id-card-outline"></ion-icon> Id</th>
                <th scope="col"><ion-icon name="person-outline"></ion-icon> Name</th>
                <th scope="col"><ion-icon name="business-outline"></ion-icon> Address</th>
                <th scope="col"><ion-icon name="business-outline"></ion-icon> Phone Number</th>
                <th scope="col"><ion-icon name="time-outline"></ion-icon> Create At</th>
                <th scope="col"><ion-icon name="timer-outline"></ion-icon> Update At</th>
                <th scope="col"><ion-icon name="browsers-outline"></ion-icon> Category</th>
                <th scope="col"><ion-icon name="logo-react"></ion-icon> Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dat)
                <tr>
                  <td>{{ $dat->id_customer }}</td>
                  <td>{{ $dat->name }}</td>
                  <td>{{ $dat->address }}</td>
                  <td>{{ $dat->phone_number }}</td>
                  <td>{{ $dat->created_at }}</td>
                  <td>{{ $dat->updated_at }}</td>
                  <td>{{ $dat->description }}</td>
                  <td>
                      <form action="{{ route('customers.edit',$dat->id_customer)}}" method="GET">
                          <button class="btn">
                              <span>
                                  <ion-icon name="create-outline" class="btn btn-outline-warning"></ion-icon>
                              </span>
                          </button>
                      </form>
                      <form action="{{ route('customers.show',$dat->id_customer)}}" method="GET">
                            <button class="btn">
                              <ion-icon name="close-outline" class="btn btn-outline-danger"></ion-icon>
                            </button>
                      </form>
                  </td>
              </tr>  
              @endforeach             
            </tbody>
          </table>
        </div>
    </div>
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