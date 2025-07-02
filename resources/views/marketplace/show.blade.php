<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $categoria->nombre }} - Mi Marketplace</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-4.css') }}">
</head>

<body>
    <header class="header header-intro-clearance header-4">
        <div class="header-top">
            <div class="container">
                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="#" class="logo">
                        <img src="{{ asset('assets/images/demos/demo-4/logo.png') }}" alt="Molla Logo" width="105" height="25">
                    </a>
                </div>

                <div class="header-center">
                    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="q" class="sr-only">Search</label>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="header-right">
                    <div class="wishlist">
                        <a href="wishlist.html" title="Wishlist">
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count badge">3</span>
                            </div>
                            <p>Wishlist</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="header-left">
                    <div class="dropdown category-dropdown">
                        <a href="#" class="dropdown-toggle" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-display="static" title="Browse Categories">
                            Categorías <i class="icon-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows">
                                    @foreach ($categorias as $cat)
                                    <li>
                                        <a href="{{ route('productos.categoria', $categoria->slug) }}">
                                            {{ $cat->nombre }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li>
                                <a href="{{ route('marketplace.index') }}">Inicio</a>
                            </li>
                            <li>
                                <a href="{{ url('/comentarios') }}">Comentarios</a>
                            </li>
                            <li class="dropdown-container">
                                <a href="#" class="sf-with-ul">Ciudades</a>
                                <ul class="dropdown-list">
                                    @foreach($ciudades as $ciudad)
                                    <li><a href="#">{{ $ciudad->nombre }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container">

            <h2 class="mb-4 mt-4">Productos en <strong>{{$categoria->nombre }}</strong></h2>
          
          

            <div class="row">
                @forelse ($productos as $producto)
                <div class="col-6 col-md-2 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('img/productos/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">${{ number_format($producto->precio, 2) }}</p>
                            <a href="#" class="btn btn-outline-primary">Ver</a>
                        </div>
                    </div>
                </div>
                @empty
                <p>No hay productos en esta categoría.</p>
                @endforelse
            </div>
        </div>
    </main>

    <footer class="footer" style="background-color: #2c2c2c; color: white; padding: 40px 0;">
        <div class="container d-flex flex-column align-items-center text-center">
            <!-- Logo centrado -->
            <a href="#" style="display: inline-block; margin-bottom: 15px;">
                <img src="assets/images/demos/demo-4/logo-footer.png" alt="Marketplace Logo" width="130" style="display: block; margin: 0 auto;">
            </a>

            <!-- Descripción -->
            <p style="max-width: 600px; font-size: 14px; margin: 0 auto;">
                "Todo lo que buscas, en un solo lugar."
            </p>

            <!-- Enlaces -->
            <div style="margin-top: 20px;">
                <a href="index.html" style="color: #ffffff; margin: 0 15px; text-decoration: none;">Inicio</a>
                <a href="about.html" style="color: #ffffff; margin: 0 15px; text-decoration: none;">Acerca de</a>
                <a href="contact.html" style="color: #ffffff; margin: 0 15px; text-decoration: none;">Contacto</a>
            </div>

            <!-- Derechos -->
            <p style="margin-top: 20px; font-size: 13px; color: #cccccc;">
                © 2025 Marketplace. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>