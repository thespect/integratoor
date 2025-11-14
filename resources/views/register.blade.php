<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded shadow-md w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Crear cuenta</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
            <ul class="text-sm">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Nombre</label>
            <input type="text" name="name" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" required class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
            Registrarme
        </button>
    </form>

    <p class="text-center text-sm mt-4">
        ¿Ya tienes cuenta? <a href="{{ route('login.view') }}" class="text-blue-500">Inicia sesión</a>
    </p>
</div>

</body>
</html>
