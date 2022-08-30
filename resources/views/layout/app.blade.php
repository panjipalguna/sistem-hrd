<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <!-- MATERIAL CDN -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />


    <link href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Data Table CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

</head>

<body>
  <div class="page-dashboard">
   <div class="d-flex " id="wrapper" data-aos="fade-right">

            @include('layout.menu')


        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light navbar-siap fixed-top" data-aos="fade-down"
         aria-label="Navbar">

         <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
           &laquo; Menu
         </button>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
           aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">

           <!-- Desktop Menu -->
           <ul class="navbar-nav d-none d-lg-flex ml-auto">
             <li class="nav-item dropdown">
               <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <img src="images/admin_picture.png" alt="" class="rounded-circle mr-2 profile-picture" />
                 Hi, Nama Admin
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="#">Dashboard</a>
                 <a class="dropdown-item" href="#">Settings</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="/login.html">Logout</a>
               </div>
             </li>
           </ul>

           <!-- Mobile Menu -->
           <ul class="navbar-nav d-block d-lg-none">
             <li class="nav-item">
               <a class="nav-link p-3" href="#">
                 <img src="images/admin_picture.png" alt="" class="rounded-circle mr-2 profile-picture" />Hi, Angga
               </a>
               <a class="dropdown-item p-3" href="/">Logout</a>
             </li>
           </ul>
         </div>
       </nav>
                  @include('layout.response')
                  @yield('main-content')
        </div>
    </div>
  </div>
</body>






  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>








  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script>
    $(document).ready(function () {
      $('#lembur').DataTable({
        scrollX: true,
      });
      $('#izin').DataTable({
        scrollX: true,
      });
    });
  </script>


  <script type="application/javascript">
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
      function confirm_delete(target, msg) {
          Swal.fire({
                  title: 'Yakin Menghapus ??',
                  text: "Pastikan Yang Kamu Pilih Benar",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          type: "DELETE",
                          url: target,
                          data:{
                              _token: '{{csrf_token()}}'
                          },
                          success: function(url){
                              console.log(url);
                              Swal.fire(
                                  'Terhapus!',
                                  'Status Berhasil Di Hapus !!',
                                  'success'
                              ),
                              table.draw();
                          }
                      });

                  }
              })
      }
  </script>

  <script type="application/javascript">
      function confirm_update(target, msg) {
          Swal.fire({
                  title: 'Yakin Mengubah ??',
                  text: "Pastikan Yang Kamu Pilih Benar",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          type: "PUT",
                          url: target,
                          data:{
                              _token: '{{csrf_token()}}'
                          },
                          success: function(url){
                              console.log(url);
                              Swal.fire(
                                  'Terhapus!',
                                  'Status Berhasil Di Hapus !!',
                                  'success'
                              ),
                              table.draw();
                          }
                      });

                  }
              })
      }
  </script>


</html>
