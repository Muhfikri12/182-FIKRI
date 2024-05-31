<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">


      {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

      {{-- Style --}}
    <style>
        body {
         font-family: 'Inter', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="style/style.css">

  </head>
  <body> 
    
    <div class="main-header ">
      {{-- header --}}
      <div class="header-home d-flex flex-wrap px-5 pt-4 pb-3 border-bottom border-primary"  style="justify-content: space-between;">
        <a class="text-decoration-none text-center " href="">Logo</a>
          <div class="regist ">
            <a class="mx-2" href="">Sign Up</a>
            <a href="/main">Login</a>
          </div>
      </div>

      {{-- Form-registration --}}
      <div class="user-regist ">
        <h5 class="text-center" style="margin: 1em 0 1.5em">Selamat Datang</h5>
        <form action="/submit_form" method="POST">
          <table class="table-home form">
            <tr>
              <td><label for="fullname">Nama Lengkap</label></td>
              <td><input type="text" id="fullname" name="fullname"></td>
            </tr>

            <tr>
              <td><label for="email">Alamat Email </label></td>
              <td><input type="email" id="email" name="email"></td> 
            </tr>

            <tr>
              <td><label for="password">Kata Sandi:</label></td>
              <td><input type="password" id="password" name="password"></td>
            </tr> 
  
            <tr>
              <td><label for="confirm_password">Ulangi Kata Sandi:</label></td>
              <td><input type="password" id="confirm_password" name="confirm_password"></td>
            </tr>

            <tr>
              <td><label for="phone">Nomor Telepon:</label></td>
              <td><input type="tel" id="phone" name="phone"></td>
            </tr> 

            <tr>
              <td><label for="birthdate">Tanggal Lahir:</label></td>
              <td><input type="date" id="birthdate" name="birthdate"></td>
            </tr> 

            <tr>
              <td><label for="gender">Jenis Kelamin:</label></td>
              <td>
                <select id="gender" name="gender">
                  <option value="male">Laki-laki</option>
                  <option value="female">Perempuan</option>
                  <option value="other">Lainnya</option>
                </select>
              </td> 
            </tr> 
          </table>
          <button class="rounded position-absolute" type="submit" style="width: 5em; right:0; margin-right:3em; ">Sign Up</button>
        </form>
      </div>
    </div>

    
    
     {{-- Feather Icons --}}
    <script>
     feather.replace();
    </script>
    </body>
  </html>
  </body>