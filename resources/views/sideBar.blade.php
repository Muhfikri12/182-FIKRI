<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Style --}}

    <style>
      .link span:hover{
        color: rgb(50, 7, 131);
      }
    </style>
  </head>
  <body>
    <div class="container px-0 mx-0 vh-100 p-4 px-2 bg-primary bg-gradient text-white" style= "width: 12rem; box-sizing:border-box"> 
      <div class="container">
        <div class="mb-4 pb-4 fs-4 text-center " style="font-style: none"> <a href="#" class="link-light text-decoration-none"> aLaundry </a>  </div>
        <div class="text-start mx-2">
          <ul class="list-group gap-4 " style="list-style: none">
            <li class="link"><a href="#" class="link-light text-decoration-none icon-link-hover"  ><i data-feather="home" class="mx-2 bi" aria-hidden="true" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span class="align-middle">Dashboard</span></a>
            <li class="link"><a href="#" class="link-light text-decoration-none icon-link-hover"  ><i data-feather="shopping-bag" class="mx-2 bi" aria-hidden="true" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span class="align-middle">Penjualan</span></a>
            <li class="link"><a href="#" class="link-light text-decoration-none icon-link-hover"  ><i data-feather="book-open" class="mx-2 bi" aria-hidden="true" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span class="align-middle">Laporan</span></a>
            <li class="link"><a href="#" class="link-light text-decoration-none icon-link-hover"  ><i data-feather="help-circle" class="mx-2 bi" aria-hidden="true" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span class="align-middle">Bantuan</span></a>
            <li class="link"><a href="#" class="link-light text-decoration-none icon-link-hover"  ><i data-feather="settings" class="mx-2 bi" aria-hidden="true" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span class="align-middle">Pengaturan</span></a>
            
          </ul>
        </div>
        <div class=" position-absolute bottom-0 left-0 height-auto my-2 border-top p-3">
          <div class="d-flex mt-15rem ">
            <div class="border border-primary rounded-circle bg-light" style="width: 2.4rem; height:2.5rem">
             <img src="" alt="" >
            </div>
            <div class="text-start mx-1">
              <p class="m-0">Username</p>
              <p class="m-0" style="font-size: 0.8rem">Admin</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- Feather Icons --}}
    <script>
      feather.replace();
      </script>
  </body>
</html>