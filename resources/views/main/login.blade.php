<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <style>
       body {
        font-family: 'Inter', sans-serif;
       }
    </style>

    {{-- Feater Icon --}}
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <section class="vh-100 gradient-custom">
        <div class="container py-3 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 g-col-4">
              <div class="card bg-dark text-white" style="border-radius: 1rem; width: 25rem;">
                <div class="card-body p-3 text-center ">
      
                  <form action="{{ route('postlogin') }}" class="mb-md-3 mt-md-2 pb-3" method="POST">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
      
                    <div data-mdb-input-init class="form-outline form-white mb-4 mx-5">
                      <input type="email" name="email" id="typeEmailX" class="form-control form-control-md fs-6" placeholder="Enter Your Email" />
                    </div>
      
                    <div data-mdb-input-init class="form-outline form-white mb-4 mx-5">
                      <input type="password" name="password" id="typePasswordX" class="form-control form-control-md fs-6 " placeholder="Enter Your Password" />
                    </div>
      
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
      
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-md px-5" type="submit">Login</button>
      
                    <div class="d-flex justify-content-center text-center mt-2 pt-1">
                      <a href="#!" class="text-white"><i class="fa-lg" style="width: 1.3rem" data-feather="facebook"></i></a>
                      <a href="#!" class="text-white"><i class="fa-lg mx-3" style="width: 1.3rem" data-feather="twitter"> </i> </a>
                      <a href="#!" class="text-white"><i class="fa-lg" style="width: 1.3rem" data-feather="mail"></i></a>
                    </div>
      
                  </form>
      
                  <div>
                    <p class="mt-1">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- Feather Icon --}}
    <script>
        feather.replace();
      </script>
  </body>
</html>