<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Comentarios - Mi Marketplace</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-4.css') }}">

    <!-- Estilo estrellas -->
    <style>
        thead th {
            background-color: #B9E5F8 ;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Opcional: más suave y coherente */
        tbody td {
            vertical-align: middle;
        }

        .star {
            color: #ffc107;
            /* Amarillo estrella */
            font-size: 20px;
        }


        .star {
            color: #ffd700;
            font-size: 20px;
        }

        .table thead {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- HEADER igual que Marketplace -->
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
                                <input type="search" class="form-control" name="q" id="q" placeholder="Buscar producto ..." required>
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
                                    @foreach ($ciudades as $ciudad)
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

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main">
        <div class="container py-5">
            <h2 class="mb-4 text-center">Lista de Comentarios</h2>

            <table class="table table-striped shadow-sm">
                <thead>
                    <tr>
                        <th>Imagen Producto</th>
                        <th>Producto</th>
                        <th>Comentario</th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comentarios as $comentario)
                    <tr>
                        <td>
                            @if($comentario->producto && $comentario->producto->imagen)
                            <img src="{{ asset('img/productos/' . $comentario->producto->imagen) }}"
                                alt="{{ $comentario->producto->nombre }}"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                            @else
                            <span>Sin imagen</span>
                            @endif
                        </td>

                        <td>{{ $comentario->producto->nombre ?? 'Sin producto' }}</td>
                        <td>{{ $comentario->descripcion }}</td>
                        <td>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=$comentario->valoracion)
                                <span class="star">&#9733;</span>
                                @else
                                <span class="star text-muted">&#9733;</span>
                                @endif
                                @endfor
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay comentarios disponibles.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <!-- FOOTER igual que Marketplace -->
    <footer class="footer" style="background-color: #2c2c2c; color: white; padding: 40px 0;">
        <div class="container d-flex flex-column align-items-center text-center">
            <a href="#" style="display: inline-block; margin-bottom: 15px;">
                <img src="{{ asset('assets/images/demos/demo-4/logo-footer.png') }}" alt="Marketplace Logo" width="130">
            </a>
            <p style="max-width: 600px; font-size: 14px; margin: 0 auto;">
                Todo lo que buscas, en un solo lugar.
            </p>
            <div style="margin-top: 20px;">
                <a href="{{ route('marketplace.index') }}" style="color: #ffffff; margin: 0 15px;">Inicio</a>
                <a href="#" style="color: #ffffff; margin: 0 15px;">Acerca de</a>
                <a href="#" style="color: #ffffff; margin: 0 15px;">Contacto</a>
            </div>
            <p style="margin-top: 20px; font-size: 13px; color: #cccccc;">© 2025 Marketplace. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>