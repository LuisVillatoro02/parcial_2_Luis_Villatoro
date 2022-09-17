@extends('layout.plantilla')
@section('TituloPagina','Category Edit')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/create-customer.css') }}">
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
                    <a href="{{ route('customers.index') }}">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="text">Customers List</span>
                    </a>
                </li>
            </ul>
        </div>
    </center>
    <div>
        <form class="form"action="{{ route('customers.update', $customer->id_customer) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <ion-icon name="person-outline"></ion-icon>
                <label>Name </label>
                <input type="text" name="name" class="form-control" placeholder="Your Name" required  value="{{ $customer->name }}">
            </div>
            <div class="form-group">
                <ion-icon name="pencil-outline"></ion-icon>
                <label>Address </label>
                <input type="text"name="address" class="form-control" placeholder="Your Address" required  value="{{ $customer->address }}">
            </div>
            <div class="form-group">
                <ion-icon name="call-outline"></ion-icon>
                <label>Phone Number</label>
                <input type="text" name="phone_number"class="form-control" placeholder="Your Phone" required  value="{{ $customer->phone_number }}">
                <small id="emailHelp" class="form-text text-muted">Recuerda Revisar Bien los datos.</small>
            </div>
            <div class="form-group">
                <ion-icon name="copy-outline"></ion-icon>
                <label>Category </label>
                <select name="id_category" class="form-control" required>
                @foreach ( $datos as $dat )
                @if ($dat->id_category == $customer->id_category )         
                    <option value="{{ $dat->id_category }}" selected>{{ $dat->description}}</option>
                @else
                <option value="{{ $dat->id_category }}">{{ $dat->description }}</option>
                @endif
                @endforeach  
            </select>  
            </div>
                    <center>
                    <button type="submit" class="btn btn-success"><ion-icon name="checkmark-outline"></ion-icon>Actualizar</button>
                    <button type="reset" class="btn btn-warning"><ion-icon name="trash-outline"></ion-icon>Borrar Datos</button>
                    <a class="btn btn-danger" href="{{ route('customers.index') }}" role="button"><ion-icon name="return-down-back-outline"></ion-icon> Cancelar</a>   
        </form>
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