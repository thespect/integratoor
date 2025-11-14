<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Paleta de colores proporcionada */
        :root {
            --color-primary: #173C4C;
            --color-secondary: #326D6C;
            --color-accent: #568F7C;
            --color-light: #85B093;
            --color-highlight: #BDDIBD;
            --color-dark: #07142B;
            --color-darker: #000009;
        }
        
        /* Animaciones suaves */
        .fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        
        .slide-up {
            animation: slideUp 0.3s ease-out forwards;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Estilos personalizados */
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-primary) 100%);
        }
        
        .bg-gradient-secondary {
            background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-accent) 100%);
        }
        
        .bg-gradient-light {
            background: linear-gradient(135deg, var(--color-light) 0%, var(--color-highlight) 100%);
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--color-highlight);
            box-shadow: 0 0 0 3px rgba(189, 222, 189, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-light) 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(86, 143, 124, 0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-accent) 100%);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(50, 109, 108, 0.3);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-primary flex items-center justify-center p-4">
    <!-- Contenedor principal -->
    <div class="glass-effect shadow-2xl rounded-2xl p-8 w-full max-w-md text-white fade-in">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2 drop-shadow">Bienvenido</h1>
            <p class="text-white/70">Inicia sesión en tu cuenta</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-500/40 text-white p-4 rounded-lg mb-6 backdrop-blur-lg slide-up">
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULARIO DE LOGIN --}}
        <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-2 font-medium">Email</label>
                <input type="email" name="email" required placeholder="tu@email.com"
                    class="w-full px-4 py-3 rounded-lg input-field text-white placeholder-white/60 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-medium">Contraseña</label>
                <input type="password" name="password" required placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg input-field text-white placeholder-white/60 focus:outline-none">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded bg-white/20 border-white/30 text-accent focus:ring-accent">
                    <span class="ml-2">Recordarme</span>
                </label>
                <a href="#" class="text-highlight hover:text-light transition-colors">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit"
                class="w-full btn-primary text-dark font-bold py-3 rounded-lg transition-all">
                Iniciar sesión
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-white/20">
            <p class="text-center text-white/80">
                ¿No tienes cuenta?
                <button onclick="openModal()" class="text-highlight font-semibold hover:text-light transition-colors ml-1">
                    Crear una aquí
                </button>
            </p>
        </div>
    </div>

    {{-- ====================================================
                        MODAL DE REGISTRO
    ==================================================== --}}
    <div id="modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-gradient-secondary rounded-2xl shadow-2xl w-full max-w-md p-8 relative fade-in text-white">
            {{-- BOTÓN CERRAR --}}
            <button onclick="closeModal()"
                class="absolute top-4 right-4 text-white/70 hover:text-white text-2xl transition-colors">&times;</button>

            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Crear cuenta</h2>
                <p class="text-white/70 mt-2">Completa el formulario para registrarte</p>
            </div>

            {{-- FORMULARIO DE REGISTRO --}}
            <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block mb-2 font-medium">Nombre completo</label>
                    <input type="text" name="name" required placeholder="Tu nombre"
                        class="w-full px-4 py-3 rounded-lg input-field text-white placeholder-white/60 focus:outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-medium">Email</label>
                    <input type="email" name="email" required placeholder="tu@email.com"
                        class="w-full px-4 py-3 rounded-lg input-field text-white placeholder-white/60 focus:outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-medium">Contraseña</label>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-lg input-field text-white placeholder-white/60 focus:outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-medium">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-lg input-field text-white placeholder-white/60 focus:outline-none">
                </div>

                <div class="text-sm">
                    <label class="flex items-start">
                        <input type="checkbox" class="mt-1 rounded bg-white/20 border-white/30 text-accent focus:ring-accent">
                        <span class="ml-2 text-white/80">Acepto los <a href="#" class="text-highlight hover:text-light transition-colors">términos y condiciones</a></span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full btn-secondary text-white font-bold py-3 rounded-lg transition-all mt-2">
                    Registrarme
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Prevenir scroll
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto'; // Restaurar scroll
        }
        
        // Cerrar modal al hacer clic fuera del contenido
        document.getElementById('modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>