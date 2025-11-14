<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded shadow-md w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Iniciar sesión</h1>

    @if(session('error'))
        <p class="text-red-500 mb-4 text-center">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Entrar</button>
    </form>
</div>

</body>
</html>
