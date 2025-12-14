<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Macrame Shop App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #3498db;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: white !important;
        }
        .nav-link.active {
            color: white !important;
            font-weight: bold;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-primary {
            background-color: var(--accent-color);
            border: none;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .btn-danger {
            background-color: var(--secondary-color);
            border: none;
        }
        .difficulty-badge {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
        }
        .difficulty-easy { background-color: #27ae60; }
        .difficulty-medium { background-color: #f39c12; }
        .difficulty-hard { background-color: #c0392b; }
        .star-rating {
            color: #f39c12;
        }
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Logo/Brand - Enlace a la página principal -->
            <a class="navbar-brand" href="{{ route('main') }}">
                <i class="fas fa-knot"></i> Macrame Shop
            </a>
            
            <!-- Botón para móvil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Inicio -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('main') ? 'active' : '' }}" 
                           href="{{ route('main') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    
                    <!-- Styles -->
                    <li class="nav-item">
                        <a class="nav-link" 
                           href="{{ route('styles.index') }}">
                            <i class="fas fa-brush"></i> Styles
                        </a>
                    </li>
                    
                    <!-- Products -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" 
                           href="{{ route('products.index') }}">
                            <i class="fas fa-box"></i> Products
                        </a>
                    </li>
                    
                    <!-- Valorations -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('valorations.*') ? 'active' : '' }}" 
                           href="{{ route('valorations.index') }}">
                            <i class="fas fa-star"></i> Reviews
                        </a>
                    </li>

                    <!-- Dropdown con acciones rápidas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-plus-circle"></i> Add New
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('styles.create') }}">
                                    <i class="fas fa-brush"></i> New Style
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('products.create') }}">
                                    <i class="fas fa-box"></i> New Product
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('valorations.create') }}">
                                    <i class="fas fa-star"></i> New Review
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container my-5">
        <!-- Mensajes de éxito -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Mensajes de error -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Errores de validación -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> <strong>Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Contenido de la página -->
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="row">
            <p class="mb-0">&copy; {{ date('Y') }} Macrame Shop App. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts adicionales personalizados -->
    @yield('scripts')

    <script>
        // Auto-ocultar alertas después de 5 segundos
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>