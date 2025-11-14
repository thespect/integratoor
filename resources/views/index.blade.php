<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Roles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --c1: #BDDIBD; /* verde muy claro/azulado */
            --c2: #85B093; /* verde claro */
            --c3: #568F7C; /* verde medio */
            --c4: #326D6C; /* verde azulado oscuro */
            --c5: #173C4C; /* azul verdoso muy oscuro */
            --c6: #07142B; /* azul noche oscuro */
            --c7: #000009; /* casi negro azulado */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, var(--c1) 0%, var(--c2) 100%);
            color: var(--c7);
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: var(--c6);
            color: white;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            position: fixed;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--c4);
        }

        .sidebar-header i {
            font-size: 24px;
            color: var(--c1);
            background: var(--c5);
            padding: 10px;
            border-radius: 10px;
        }

        .sidebar h2 {
            margin: 0;
            color: var(--c1);
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--c1);
            background: transparent;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .menu a:hover {
            background: var(--c4);
            color: white;
            transform: translateX(5px);
        }

        .menu a i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .menu a.active {
            background: var(--c4);
            color: white;
        }

        /* ================= CONTENIDO PRINCIPAL ================= */
        .main {
            margin-left: 260px;
            padding: 35px 30px;
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        .header {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            margin: 0;
            color: var(--c5);
            font-size: 28px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header h1 i {
            color: var(--c3);
            background: rgba(86, 143, 124, 0.1);
            padding: 10px;
            border-radius: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--c3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .logout-btn {
            background: var(--c4);
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: var(--c5);
            transform: translateY(-2px);
        }

        /* ================= GRID TARJETAS ================= */
        .roles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .role-card {
            background: white;
            padding: 28px 24px;
            border-radius: 18px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border-left: 6px solid var(--c3);
            display: flex;
            flex-direction: column;
            gap: 12px;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .role-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .role-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .role-title {
            font-size: 22px;
            color: var(--c4);
            font-weight: 700;
        }

        .role-id {
            font-size: 14px;
            color: var(--c5);
            margin-top: 5px;
        }

        .role-status {
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .status-active {
            background: linear-gradient(135deg, #32CD32, #28a428);
            color: white;
        }

        .status-inactive {
            background: linear-gradient(135deg, #FF6B6B, #ee5a5a);
            color: white;
        }

        .role-date {
            font-size: 14px;
            color: var(--c5);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 5px;
        }

        .role-date i {
            color: var(--c3);
        }

        /* Estadísticas */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .stat-info h3 {
            font-size: 24px;
            color: var(--c5);
            margin: 0;
        }

        .stat-info p {
            font-size: 14px;
            color: var(--c4);
            margin: 0;
        }

        /* Mensaje vacío */
        .empty-message {
            grid-column: 1/-1;
            text-align: center;
            padding: 50px 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .empty-message i {
            font-size: 60px;
            color: var(--c3);
            margin-bottom: 15px;
            opacity: 0.7;
        }

        .empty-message h3 {
            font-size: 22px;
            color: var(--c5);
            margin-bottom: 10px;
        }

        .empty-message p {
            font-size: 16px;
            color: var(--c4);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 100;
            }
            
            .main {
                margin-left: 0;
                width: 100%;
            }
            
            .menu-toggle {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 101;
                background: var(--c4);
                color: white;
                border: none;
                padding: 10px 12px;
                border-radius: 8px;
                font-size: 18px;
                cursor: pointer;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .roles-grid {
                grid-template-columns: 1fr;
            }
            
            .main {
                padding: 20px;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Botón para mostrar/ocultar sidebar en móviles -->
    <button class="menu-toggle" id="menuToggle" style="display: none;">
        <i class="fas fa-bars"></i>
    </button>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-user-shield"></i>
            <h2>Panel Admin</h2>
        </div>
        <div class="menu">
            <a href="#">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="active">
                <i class="fas fa-user-tag"></i>
                <span>Roles</span>
            </a>
            <a href="#">
                <i class="fas fa-users"></i>
                <span>Usuarios</span>
            </a>
            <a href="#">
                <i class="fas fa-key"></i>
                <span>Permisos</span>
            </a>
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Configuración</span>
            </a>
        </div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="main">
        <div class="header">
            <h1><i class="fas fa-user-tag"></i> Roles del Sistema</h1>
            <div class="user-info">
                <div class="user-avatar">A</div>
                <a href="{{ route('logout') }}" class="logout-btn" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon" style="background: var(--c3);">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $roles->count() }}</h3>
                    <p>Total de Roles</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #32CD32;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $roles->where('status', true)->count() }}</h3>
                    <p>Roles Activos</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #FF6B6B;">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $roles->where('status', false)->count() }}</h3>
                    <p>Roles Inactivos</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: var(--c4);">
                    <i class="fas fa-history"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $roles->last() ? $roles->last()->nombre : 'N/A' }}</h3>
                    <p>Último Rol</p>
                </div>
            </div>
        </div>

        <!-- Grid de roles -->
        <div class="roles-grid">
            @forelse ($roles as $r)
            <div class="role-card">
                <div class="role-header">
                    <div>
                        <div class="role-title">{{ $r->nombre }}</div>
                        <div class="role-id">ID: {{ $r->id }}</div>
                    </div>
                    <div class="role-status {{ $r->status ? 'status-active' : 'status-inactive' }}">
                        <i class="fas fa-{{ $r->status ? 'check' : 'times' }}-circle"></i>
                        {{ $r->status ? 'Activo' : 'Inactivo' }}
                    </div>
                </div>
                <div class="role-date">
                    <i class="far fa-calendar"></i>
                    <span>Creado: {{ $r->fecha_creacion }}</span>
                </div>
            </div>
            @empty
            <div class="empty-message">
                <i class="fas fa-inbox"></i>
                <h3>No hay roles registrados</h3>
                <p>Actualmente no hay roles disponibles en el sistema.</p>
            </div>
            @endforelse
        </div>
    </div>

    <script>
        // Función para manejar el responsive del sidebar
        function setupResponsive() {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            
            if (window.innerWidth <= 1024) {
                menuToggle.style.display = 'block';
                sidebar.classList.remove('active');
                
                menuToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                });
                
                // Cerrar sidebar al hacer clic fuera de él
                document.addEventListener('click', (e) => {
                    if (!sidebar.contains(e.target) && !menuToggle.contains(e.target) && sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                    }
                });
            } else {
                menuToggle.style.display = 'none';
                sidebar.classList.add('active');
            }
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', () => {
            setupResponsive();
            
            // Actualizar en caso de redimensionamiento
            window.addEventListener('resize', setupResponsive);
            
            // Manejar el cierre de sesión
            document.getElementById('logoutBtn').addEventListener('click', function(e) {
                if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>