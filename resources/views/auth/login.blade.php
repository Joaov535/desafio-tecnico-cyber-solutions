<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Cyber Solutions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body
    class="bg-amber-50 dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full lg:max-w-4xl lg:flex-row justify-center">

            <form method="POST" action="/login" class="flex flex-col gap-6 border-2 p-10 rounded-2xl bg-white">
                @csrf

                @if ($errors->any())
                    <div style="color:red;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <label for="login">Login</label>
                        <input id="login" name="login" type="text" required autofocus
                            placeholder="Digite seu login..." value="cyber.solutions" />
                    </div>

                    <div class="grid gap-2">
                        <div class="flex items-center justify-between">
                            <label for="password">Senha</label>
                        </div>
                        <input id="password" name="password" type="password" required placeholder="********"
                            title="Mínimo 8 caracteres" value="teste" />
                    </div>

                    <button type="submit" class="mt-4 w-full bg-amber-950 text-white">
                        Login
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
