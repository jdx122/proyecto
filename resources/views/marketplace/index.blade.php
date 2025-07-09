<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marketplace</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="assets/css/demos/demo-4.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            <div class="header-top">
                <div class="container">


                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                    </li>
                                    <li>
                                    </li>
                                    <li><a href="{{ url('/register') }}">Registrar</a></li>

                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="#" class="logo">
                            <img src="assets/images/demos/demo-4/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="dropdown compare-dropdown">



                        </div><!-- End .compare-dropdown -->

                        <div class="wishlist">
                            <a href="wishlist.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                data-display="static" title="Browse Categories">
                                Categorias <i class="icon-angle-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        @foreach ($categorias as $categoria)
                                        <li>
                                            <a href="{{ route('productos.categoria', $categoria->slug) }}">
                                                {{ $categoria->nombre }}
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
                                <!-- INICIO -->
                                <li>
                                    <a href="{{ route('marketplace.index') }}">Inicio</a>
                                </li>


                                <!-- COMENTARIOS -->
                                <li>
                                    <a href="{{ url('/comentarios-publicos') }}">Comentarios</a>
                                </li>

                                <!-- CIUDADES -->
                                <li class="dropdown-container">
                                    <a href="#" class="sf-with-ul">Ciudades</a>
                                    <ul class="dropdown-list">
                                        @foreach($ciudades as $ciudad)
                                        <li><a href="#">{{ $ciudad->nombre }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                    </div><!-- End .container -->
                </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
                    data-owl-options='{
            "dots": true,
            "nav": false, 
            "responsive": {
                "1200": {
                    "nav": true,
                    "dots": false
                }
            }
        }'>

                    <!-- Slide 1 -->
                    <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide-1.png);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third">¿Te interesa las opiniones?</h3>
                                    <h1 class="intro-title">¡Visita el</h1>
                                    <h1 class="intro-title">apartado de comentarios!</h1>
                                    <a href="{{ url('/comentarios-publicos') }}" class="btn btn-primary btn-round">
                                        <span>Comentarios</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide-2.png);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-primary">¿Ya te registraste?</h3>
                                    <h1 class="intro-title">Haz parte de <br>nosotros</h1>
                                    <a href="{{ url('/register') }}" class="btn btn-primary btn-round">
                                        <span>Registrarse</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide-3.png);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-primary">¿Necesitas ayuda?</h3>
                                    <h1 class="intro-title">Contáctanos<br>en cualquier momento</h1>
                                    <a href="#" class="btn btn-primary btn-round">
                                        <span>Contáctanos</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- End .intro-slider -->

                <span class="slider-loader"></span>
            </div> <!-- End .intro-slider-container -->


            <div class="container">
                <h2 class="title text-center mb-4">Explora las categorias mas populares</h2><!-- End .title text-center -->

                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach ($categorias as $categoria)
                        <div class="col-6 col-sm-4 col-lg-2">

                            <a href="{{ route('productos.categoria', $categoria->slug) }}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('img/categorias/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}">

                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{ $categoria->nombre }}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach


                    </div><!-- End .container -->

                    <div class="mb-4"></div><!-- End .mb-4 -->



                    <div class="mb-3"></div><!-- End .mb-5 -->



                    <div class="mb-6"></div><!-- End .mb-6 -->

                    <div class="container">
                        <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
                            <img src="assets/images/demos/demo-4/jdxcool_resized.png" alt="camera" class="cta-img">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="cta-content">
                                        <div class="cta-text text-right text-white">
                                            <p>Todo lo que buscas <br><strong>En un solo lugar</strong></p>
                                        </div><!-- End .cta-text -->
                                        <a href="#" class="btn btn-primary btn-round"><span>Empezar</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .cta-content -->
                                </div><!-- End .col-md-12 -->
                            </div><!-- End .row -->
                        </div><!-- End .cta -->
                    </div><!-- End .container -->


                    <div class="container">
                        <hr class="mb-0">
                        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl"
                            data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .container -->


                    <div class="mb-5"></div><!-- End .mb-5 -->

                    <div class="container for-you">
                        <section class="mb-5">
                            <div class="container">
                                <h2 class="mb-4">Recomendaciones para ti</h2>

                                <div class="row">
                                    @forelse ($productos as $producto)
                                    <div class="col-6 col-md-3 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                alt="{{ $producto->nombre }}"
                                                class="card-img-top p-3" style="height: 200px; object-fit: contain;">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle text-muted">{{ $producto->categoria->nombre ?? '' }}</h6>
                                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                                <p class="card-text">${{ number_format($producto->valor, 2) }}</p>

                                                {{-- Estrellas --}}
                                                <div>
                                                    @php
                                                    $promedio = $producto->comentarios->avg('valoracion') ?? 0;
                                                    @endphp
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <=round($promedio))
                                                        <span style="color: #FFD700;">&#9733;</span>
                                                        @else
                                                        <span style="color: #ccc;">&#9733;</span>
                                                        @endif
                                                        @endfor
                                                        <small class="text-muted">({{ $producto->comentarios->count() }} Comentarios)</small>
                                                </div>

                                                <a href="#"
                                                    class="btn btn-outline-primary mt-2"
                                                    data-toggle="modal"
                                                    data-target="#modalProducto{{ $producto->id }}">
                                                    Ver Producto
                                                </a>

                                                <!-- Modal Detalle Producto -->
                                                <div class="modal fade" id="modalProducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                        <div class="modal-content custom-modal-content p-4">
                                                            <div class="modal-header border-0">
                                                                <h5 class="modal-title">{{ $producto->nombre }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body d-flex flex-column flex-md-row align-items-center">
                                                                <div class="modal-img mb-3 mb-md-0 text-center">
                                                                    <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                        alt="{{ $producto->nombre }}"
                                                                        class="img-fluid rounded-circle shadow"
                                                                        style="width: 250px; height: 250px; object-fit: cover;">
                                                                </div>
                                                                <div class="modal-details ml-md-5">
                                                                    <p><strong>Slug:</strong> {{ $producto->slug }}</p>
                                                                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                                                                    <p><strong>Valor:</strong> ${{ number_format($producto->valor, 2) }}</p>
                                                                    <p><strong>Estado producto:</strong> {{ $producto->estado_producto }}</p>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="text-center">No hay productos disponibles.</p>
                                    @endforelse
                                </div>

                        </section>


                        <div class="mb-4"></div><!-- End .mb-4 -->

                        <div class="container">
                            <hr class="mb-0">
                        </div><!-- End .container -->

                        <div class="icon-boxes-container bg-transparent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-rocket"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Envios a todo el pais</h3><!-- End .icon-box-title -->
                                                <p>Ordena ya</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-rotate-left"></i>
                                            </span>

                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Devoluciones gratuitas</h3><!-- End .icon-box-title -->
                                                <p>Con hasta 30 dias</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-info-circle"></i>
                                            </span>

                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Obten 20% Off en tu primera compra</h3><!-- End .icon-box-title -->
                                                <p>Cuando te registras</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-life-ring"></i>
                                            </span>

                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Soporte</h3><!-- End .icon-box-title -->
                                                <p>24/7 servicio optimo</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->
                                </div><!-- End .row -->
                            </div><!-- End .container -->
                        </div><!-- End .icon-boxes-container -->
        </main><!-- End .main -->

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



        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

        <!-- Mobile Menu -->
        <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

        <div class="mobile-menu-container mobile-menu-light">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="icon-close"></i></span>

                <form action="#" method="get" class="mobile-search">
                    <label for="mobile-search" class="sr-only">Search</label>
                    <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </form>

                <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                        <nav class="mobile-nav">
                            <ul class="mobile-menu">
                                <li class="active">
                                    <a href="index.html">Home</a>

                                    <ul>
                                        <li><a href="index-1.html">01 - furniture store</a></li>
                                        <li><a href="index-2.html">02 - furniture store</a></li>
                                        <li><a href="index-3.html">03 - electronic store</a></li>
                                        <li><a href="index-4.html">04 - electronic store</a></li>
                                        <li><a href="index-5.html">05 - fashion store</a></li>
                                        <li><a href="index-6.html">06 - fashion store</a></li>
                                        <li><a href="index-7.html">07 - fashion store</a></li>
                                        <li><a href="index-8.html">08 - fashion store</a></li>
                                        <li><a href="index-9.html">09 - fashion store</a></li>
                                        <li><a href="index-10.html">10 - shoes store</a></li>
                                        <li><a href="index-11.html">11 - furniture simple store</a></li>
                                        <li><a href="index-12.html">12 - fashion simple store</a></li>
                                        <li><a href="index-13.html">13 - market</a></li>
                                        <li><a href="index-14.html">14 - market fullwidth</a></li>
                                        <li><a href="index-15.html">15 - lookbook 1</a></li>
                                        <li><a href="index-16.html">16 - lookbook 2</a></li>
                                        <li><a href="index-17.html">17 - fashion store</a></li>
                                        <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                                        <li><a href="index-19.html">19 - games store</a></li>
                                        <li><a href="index-20.html">20 - book store</a></li>
                                        <li><a href="index-21.html">21 - sport store</a></li>
                                        <li><a href="index-22.html">22 - tools store</a></li>
                                        <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                                        <li><a href="index-24.html">24 - extreme sport store</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.html">Shop</a>
                                    <ul>
                                        <li><a href="category-list.html">Shop List</a></li>
                                        <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                        <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                        <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                        <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                        <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                        <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                        <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="#">Lookbook</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="product.html" class="sf-with-ul">Product</a>
                                    <ul>
                                        <li><a href="product.html">Default</a></li>
                                        <li><a href="product-centered.html">Centered</a></li>
                                        <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                        <li><a href="product-gallery.html">Gallery</a></li>
                                        <li><a href="product-sticky.html">Sticky Info</a></li>
                                        <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                        <li><a href="product-fullwidth.html">Full Width</a></li>
                                        <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li>
                                            <a href="about.html">About</a>

                                            <ul>
                                                <li><a href="about.html">About 01</a></li>
                                                <li><a href="about-2.html">About 02</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>

                                            <ul>
                                                <li><a href="contact.html">Contact 01</a></li>
                                                <li><a href="contact-2.html">Contact 02</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>

                                    <ul>
                                        <li><a href="blog.html">Classic</a></li>
                                        <li><a href="blog-listing.html">Listing</a></li>
                                        <li>
                                            <a href="#">Grid</a>
                                            <ul>
                                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Masonry</a>
                                            <ul>
                                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Mask</a>
                                            <ul>
                                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Single Post</a>
                                            <ul>
                                                <li><a href="single.html">Default with sidebar</a></li>
                                                <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                                <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="elements-list.html">Elements</a>
                                    <ul>
                                        <li><a href="elements-products.html">Products</a></li>
                                        <li><a href="elements-typography.html">Typography</a></li>
                                        <li><a href="elements-titles.html">Titles</a></li>
                                        <li><a href="elements-banners.html">Banners</a></li>
                                        <li><a href="elements-product-category.html">Product Category</a></li>
                                        <li><a href="elements-video-banners.html">Video Banners</a></li>
                                        <li><a href="elements-buttons.html">Buttons</a></li>
                                        <li><a href="elements-accordions.html">Accordions</a></li>
                                        <li><a href="elements-tabs.html">Tabs</a></li>
                                        <li><a href="elements-testimonials.html">Testimonials</a></li>
                                        <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                        <li><a href="elements-portfolio.html">Portfolio</a></li>
                                        <li><a href="elements-cta.html">Call to Action</a></li>
                                        <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav><!-- End .mobile-nav -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                        <nav class="mobile-cats-nav">
                            <ul class="mobile-cats-menu">
                                <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                                <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                                <li><a href="#">Beds</a></li>
                                <li><a href="#">Lighting</a></li>
                                <li><a href="#">Sofas & Sleeper sofas</a></li>
                                <li><a href="#">Storage</a></li>
                                <li><a href="#">Armchairs & Chaises</a></li>
                                <li><a href="#">Decoration </a></li>
                                <li><a href="#">Kitchen Cabinets</a></li>
                                <li><a href="#">Coffee & Tables</a></li>
                                <li><a href="#">Outdoor Furniture </a></li>
                            </ul><!-- End .mobile-cats-menu -->
                        </nav><!-- End .mobile-cats-nav -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->

                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                </div><!-- End .social-icons -->
            </div><!-- End .mobile-menu-wrapper -->
        </div><!-- End .mobile-menu-container -->



        <!-- Plugins JS File -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.hoverIntent.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/superfish.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/bootstrap-input-spinner.js"></script>
        <script src="assets/js/jquery.plugin.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/demos/demo-4.js"></script>
</body>


<!-- molla/index-4.html  22 Nov 2019 09:54:18 GMT -->

</html>