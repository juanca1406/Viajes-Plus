<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWorld - Descubre el mundo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fas fa-paper-plane me-2"></i>Viajes Plus
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-medium" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Destinos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Contacto</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-primary" href="./vista/login.php">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-dark text-white position-relative"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center; height: 80vh;">
        <div class="container h-100 d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold mb-4">Descubre tu próxima aventura</h1>
                    <p class="lead mb-5">Explora destinos fascinantes y vive experiencias únicas con nuestros paquetes
                        exclusivos.</p>
                    <button class="btn btn-primary btn-lg px-4 py-2">Explorar Destinos</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Box -->
    <div class="container">
        <div class="card shadow p-4 mt-n5 mb-5 position-relative bg-white rounded-3 z-index-1">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Destino</label>
                    <select class="form-select">
                        <option selected>Selecciona un destino</option>
                        <option>Cancún, México</option>
                        <option>Madrid, España</option>
                        <option>París, Francia</option>
                        <option>Tokio, Japón</option>
                        <option>Nueva York, EEUU</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha de ida</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha de vuelta</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Viajeros</label>
                    <select class="form-select">
                        <option selected>2 adultos</option>
                        <option>1 adulto</option>
                        <option>2 adultos, 1 niño</option>
                        <option>2 adultos, 2 niños</option>
                    </select>
                </div>
                <div class="col-12 text-center mt-4">
                    <button class="btn btn-primary px-4 py-2">Buscar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Destinations -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 position-relative pb-3 border-bottom border-3 border-primary d-inline-block">
                Destinos Populares
            </h2>
            <div class="row g-4 mt-3">
                <!-- Destination 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1560950903-1c4d8a13a4af?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Bali" style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute bottom-0 end-0 bg-white text-primary fw-bold rounded-pill m-3 px-3 py-1">Desde
                                $950</span>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold">Bali, Indonesia</h5>
                            <p class="text-muted small">
                                <i class="fas fa-map-marker-alt me-2 text-primary"></i>7 días / 6 noches
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                    <span class="ms-1">4.7</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1523531294919-4bcd7c65e216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Paris" style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute bottom-0 end-0 bg-white text-primary fw-bold rounded-pill m-3 px-3 py-1">Desde
                                $1100</span>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold">París, Francia</h5>
                            <p class="text-muted small">
                                <i class="fas fa-map-marker-alt me-2 text-primary"></i>5 días / 4 noches
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <span class="ms-1">5.0</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1571773451026-54c689edc189?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Cancun" style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute bottom-0 end-0 bg-white text-primary fw-bold rounded-pill m-3 px-3 py-1">Desde
                                $850</span>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold">Cancún, México</h5>
                            <p class="text-muted small">
                                <i class="fas fa-map-marker-alt me-2 text-primary"></i>6 días / 5 noches
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <span class="ms-1">4.3</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1555149829-ff597faa6a59?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Tokyo" style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute bottom-0 end-0 bg-white text-primary fw-bold rounded-pill m-3 px-3 py-1">Desde
                                $1200</span>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold">Tokio, Japón</h5>
                            <p class="text-muted small">
                                <i class="fas fa-map-marker-alt me-2 text-primary"></i>8 días / 7 noches
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                    <span class="ms-1">4.6</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold mb-4 position-relative pb-3 border-bottom border-3 border-primary d-inline-block">
                Ofertas Especiales
            </h2>
            <div class="row g-4 mt-3">
                <!-- Offer 1 -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2 fw-bold">25%
                                DCTO</span>
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <img src="https://images.unsplash.com/photo-1613395877344-13d4a8e0d49e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                                        alt="Special Offer" class="img-fluid h-100" style="object-fit: cover;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body p-4">
                                        <h4 class="fw-bold mb-2">Paquete Cancún</h4>
                                        <p class="text-muted small mb-3">Todo incluido + vuelos</p>
                                        <p>Disfruta del mejor resort con acceso a playa privada y actividades
                                            ilimitadas.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-primary">Desde $699</span>
                                            <a href="#" class="btn btn-sm btn-primary">Ver oferta</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Offer 2 -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2 fw-bold">15%
                                DCTO</span>
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <img src="https://images.unsplash.com/photo-1602002418816-5c0aeef426aa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                                        alt="Special Offer" class="img-fluid h-100" style="object-fit: cover;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body p-4">
                                        <h4 class="fw-bold mb-2">Orlando - Disney</h4>
                                        <p class="text-muted small mb-3">Paquete familiar</p>
                                        <p>Plan completo con boletos para los parques, hotel y traslados incluidos.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-primary">Desde $1,299</span>
                                            <a href="#" class="btn btn-sm btn-primary">Ver oferta</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-4">¿Listo para tu próximo viaje?</h2>
                    <p class="mb-4">Suscríbete a nuestro boletín y recibe ofertas exclusivas antes que nadie.</p>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Tu correo electrónico">
                                <button class="btn btn-light" type="button">Suscribirse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel Categories -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 position-relative pb-3 border-bottom border-3 border-primary d-inline-block">
                Categorías de Viaje
            </h2>
            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="card text-white border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1565967511849-76a60a516170?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                            class="card-img" alt="Beach" style="height: 250px; object-fit: cover;">
                        <div class="card-img-overlay d-flex flex-column justify-content-end"
                            style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 70%);">
                            <h5 class="card-title fw-bold mb-0 fs-3">Playa</h5>
                            <p class="card-text">Los mejores destinos para relajarse junto al mar.</p>
                            <a href="#" class="text-white">Explorar <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1491555103944-7c647fd857e6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                            class="card-img" alt="Mountain" style="height: 250px; object-fit: cover;">
                        <div class="card-img-overlay d-flex flex-column justify-content-end"
                            style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 70%);">
                            <h5 class="card-title fw-bold mb-0 fs-3">Montaña</h5>
                            <p class="card-text">Aventuras en los paisajes más impresionantes.</p>
                            <a href="#" class="text-white">Explorar <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1444084316824-dc26d6657664?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MTF9&auto=format&fit=crop&w=800&q=80"
                            class="card-img" alt="City" style="height: 250px; object-fit: cover;">
                        <div class="card-img-overlay d-flex flex-column justify-content-end"
                            style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 70%);">
                            <h5 class="card-title fw-bold mb-0 fs-3">Ciudad</h5>
                            <p class="card-text">Descubre las metrópolis más fascinantes del mundo.</p>
                            <a href="#" class="text-white">Explorar <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold mb-5 text-center">Lo Que Dicen Nuestros Clientes</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm p-4">
                        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="text-center">
                                        <img src="https://randomuser.me/api/portraits/women/42.jpg"
                                            class="rounded-circle mb-3" width="80" height="80" alt="Client">
                                        <div class="mb-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <p class="mb-4">"Una experiencia increíble. La organización fue perfecta, el
                                            alojamiento excelente y las actividades recomendadas justo lo que
                                            buscábamos."</p>
                                        <h5 class="fw-bold mb-0">María Rodríguez</h5>
                                        <p class="text-muted small">Viaje a Bali</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="text-center">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg"
                                            class="rounded-circle mb-3" width="80" height="80" alt="Client">
                                        <div class="mb-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                        </div>
                                        <p class="mb-4">"El servicio que nos brindaron fue excelente desde la reserva
                                            hasta el regreso. Definitivamente volveré a viajar con ustedes."</p>
                                        <h5 class="fw-bold mb-0">Carlos Gómez</h5>
                                        <p class="text-muted small">Viaje a París</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-primary rounded-circle"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-primary rounded-circle"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3">TravelWorld</h5>
                    <p>Somos una agencia de viajes comprometida con brindarte las mejores experiencias al mejor precio.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Enlaces</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Inicio</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Destinos</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Ofertas</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Destinos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Europa</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Caribe</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Asia</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Estados Unidos</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Sudamérica</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="fw-bold mb-3">Contacto</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Calle Principal 123, CDMX</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@travelworld.com</li>
                    </ul>
                </div>
            </div>
            <div class="text-center border-top border-secondary pt-4 mt-4">
                <p class="small text-secondary mb-0">© 2023 TravelWorld. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript básico para inicializar componentes y efectos
        document.addEventListener('DOMContentLoaded', function () {
            // Inicializar carrusel
            var myCarousel = document.querySelector('#testimonialCarousel');
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 5000
            });

            // Animación simple para las tarjetas al hacer scroll usando clases de Bootstrap
            const animateOnScroll = () => {
                const cards = document.querySelectorAll('.card');
                cards.forEach(card => {
                    const cardPosition = card.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;

                    if (cardPosition < screenPosition) {
                        card.classList.add('translate-on-scroll');
                    }
                });
            };

            // Agregar clase para animación
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.transition = 'all 0.5s ease-out';
                card.classList.add('opacity-0', 'translate-y-25');
            });

            // Ejecutar animación al cargar y al hacer scroll
            animateOnScroll();
            window.addEventListener('scroll', animateOnScroll);
        });
    </script>
</body>

</html>