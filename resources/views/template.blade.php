<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >
  </head>
  <body id="page-top">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


   <nav class="navbar navbar-expand-lg navbar-dark text-uppercase" style="background: #004696;" id="mainNav">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a href="/" class="nav-link active m-2 menu-item">Strona główna</a>
              </li>
              <li class="nav-item">
                  <a href="/pracownik" class="nav-link active m-2 menu-item">Strefa pracownika</a>
              </li>
              <li class="nav-item">
                  <a href="/pracodawca" class="nav-link active m-2 menu-item">Strefa pracodawcy</a>
              </li>
              <li class="nav-item">
                <a href="oferty" class="nav-link active m-2 menu-item">Oferty pracy</a>
              </li>
              <li class="nav-item">
                  <a href="/zakwaterowanie" class="nav-link active m-2 menu-item">Zakwaterowanie</a>
              </li>
        </div>

        <button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg>
          Dodaj ofertę
        </button>
      </div>
          </ul>
  </nav>
      @yield('content')

        <footer>
         <p>Copyright © 2020
           <a class="text-light" href="https://fundacjaglosmlodych.org/">Fundacja Głos Młodych</a>
         </p>
       </footer>
  </body>
</html>