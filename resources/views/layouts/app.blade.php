<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>App</title>
</head>

<body>
    <header class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <a class="navbar-brand" href="">SISPAY</a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index-employees')}}">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home-payments')}}">Payments</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <footer class="footer fixed-bottom bg-light text-center">
        <div class="container">
            <p class="mb-0">Sispay-2024₢</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
