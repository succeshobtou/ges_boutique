<!DOCTYPE html>
<html>
<head>
    <title>Gestion Boutique</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="#">Gestion Boutique</a>

        <div>
            <a href="{{ route('clients.index') }}" class="btn btn-light">
                Clients
            </a>

            <a href="{{ route('produits.index') }}" class="btn btn-light">
                Produits
            </a>

            <a href="{{ route('commandes.index') }}" class="btn btn-light">
                Commandes
            </a>
        </div>

    </div>
</nav>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>