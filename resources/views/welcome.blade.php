@extends('layout.plantilla')
@section('TituloPagina','Principal Menu')
@section('contenido')
<link rel="stylesheet" href="css/index.css">
<div class="navigation">
    <ul>
        <li class="list active">
            <a href="#">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="text">Home</span>
            </a>
        </li>
        <li class="list">
            <a href="{{ route('customers.index') }}">
                <span class="icon"><ion-icon name="accessibility-outline"></ion-icon></span>
                <span class="text">Customers</span>
            </a>
        </li>
        <li class="list">
            <a href="{{ route('categories.index') }}">
                <span class="icon"><ion-icon name="copy-outline"></ion-icon></span>
                <span class="text">Categories</span>
            </a>
        </li>
        <li class="list">
            <a href="https://github.com/LuisVillatoro02">
                <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                <span class="text">About Us</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                <span class="text">Logout</span>
            </a>
        </li>
        <div class="indicador"></div>
    </ul>
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
@endsection