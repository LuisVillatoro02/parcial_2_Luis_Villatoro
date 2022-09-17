
        <div class="navigation">
            <ul>
                <li class="list active">
                    <a href="/">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="{{ route('categories.index') }}">
                        <span class="icon"><ion-icon name="list-circle-outline"></ion-icon></span>
                        <span class="text">Categories List</span>
                    </a>
                </li>
                <li class="list">
                    <a href="{{ route('categories.create') }}">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="text">Create Category</span>
                    </a>
                </li>
                <div class="indicator"></div>
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
    </body>
</html>