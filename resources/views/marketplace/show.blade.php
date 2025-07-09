<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $categoria->nombre }} - Mi Marketplace</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-4.css') }}">

    <!-- Estilos para animación del modal -->
    <style>
        .animated-modal {
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.4s ease;
        }

        .modal.show .animated-modal {
            transform: translateY(0);
            opacity: 1;
        }

        .custom-modal-content {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            border: none;
            padding: 20px;
        }

        .modal-img img {
            border: 4px solid #f1f1f1;
        }

        .modal-details p {
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 3px 8px;
            border-radius: 4px;
        }
    </style>
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

                    <a href="{{ route('marketplace.index') }}" class="logo">
                        <img src="{{ asset('assets/images/demos/demo-4/logo.png') }}" alt="Marketplace Logo" width="105" height="25">
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
                                        <a href="{{ route('productos.categoria', $cat->slug) }}">
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
                            <li><a href="{{ route('marketplace.index') }}">Inicio</a></li>
                            <li><a href="{{ url('/comentarios-publicos') }}">Comentarios</a></li>
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
            <h2 class="mb-4 mt-4">Productos en <strong>{{ $categoria->nombre }}</strong></h2>

            <div class="row">
                @forelse ($productos as $producto)
                <div class="col-6 col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('img/productos/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">${{ number_format($producto->valor, 2) }}</p>
                            <button type="button" class="btn btn-outline-primary"
                                data-toggle="modal" data-target="#modalProducto{{ $producto->id }}">
                                Ver
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalProducto{{ $producto->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="modalLabel{{ $producto->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered animated-modal" role="document">
                        <div class="modal-content custom-modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">{{ $producto->nombre }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body d-flex flex-column flex-md-row align-items-center">
                                <div class="modal-img mb-3 mb-md-0 text-center">
                                    <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                        alt="{{ $producto->nombre }}"
                                        class="img-fluid rounded-circle shadow"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                </div>
                                <div class="modal-details ml-md-4">
                                    <p><strong>Slug:</strong> {{ $producto->slug }}</p>
                                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                                    <p><strong>Valor:</strong> ${{ number_format($producto->valor, 2) }}</p>
                                    <p><strong>Estado del producto:</strong> {{ $producto->estado_producto }}</p>
                                    <p><strong>Estado:</strong>
                                        @if($producto->estado == 'Activa')
                                        <span class="badge badge-success">Activa</span>
                                        @else
                                        <span class="badge badge-danger">{{ $producto->estado }}</span>
                                        @endif
                                    </p>
                                    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? '-' }}</p>
                                    <p><strong>Ciudad:</strong> {{ $producto->ciudad->nombre ?? '-' }}</p>

                                </div>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-primary btn-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 9h8" />
                                            <path d="M8 13h6" />
                                            <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                                        </svg>
                                        Mensaje
                                    </a>
                                </div>
                            </div>
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
            <a href="#" style="display: inline-block; margin-bottom: 15px;">
                <img src="{{ asset('assets/images/demos/demo-4/logo-footer.png') }}" alt="Marketplace Logo" width="130">
            </a>
            <p style="max-width: 600px; font-size: 14px; margin: 0 auto;">Todo lo que buscas, en un solo lugar.</p>
            <div style="margin-top: 20px;">
                <a href="index.html" style="color: #ffffff; margin: 0 15px;">Inicio</a>
                <a href="about.html" style="color: #ffffff; margin: 0 15px;">Acerca de</a>
                <a href="contact.html" style="color: #ffffff; margin: 0 15px;">Contacto</a>
            </div>
            <p style="margin-top: 20px; font-size: 13px; color: #cccccc;">© 2025 Marketplace. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>