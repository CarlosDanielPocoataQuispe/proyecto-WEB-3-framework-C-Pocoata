<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #f5f5f5; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        header { background: #2c3e50; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        nav ul { display: flex; list-style: none; gap: 15px; margin-top: 10px; }
        nav a { color: white; text-decoration: none; padding: 8px 15px; background: #34495e; border-radius: 4px; }
        nav a:hover, nav a.active { background: #1abc9c; }
        .alert { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin: 10px 0; }
        table { width: 100%; background: white; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #ecf0f1; }
        tr:hover { background: #f9f9f9; }
        .btn { display: inline-block; padding: 8px 15px; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; margin: 2px; }
        .btn-primary { background: #3498db; color: white; }
        .btn-edit { background: #2ecc71; color: white; }
        .btn-delete { background: #e74c3c; color: white; }
        .btn:hover { opacity: 0.9; }
        .form-container { background: white; padding: 30px; border-radius: 8px; max-width: 500px; margin: 0 auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .actions { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestión de Eventos</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('eventos.index') }}" class="{{ request()->is('eventos*') ? 'active' : '' }}">Eventos</a></li>
                    <li><a href="{{ route('lugares.index') }}" class="{{ request()->is('lugares*') ? 'active' : '' }}">Lugares</a></li>
                    <li><a href="{{ route('roles.index') }}" class="{{ request()->is('roles*') ? 'active' : '' }}">Roles</a></li>
                    <li><a href="{{ route('asistentes.index') }}" class="{{ request()->is('asistentes*') ? 'active' : '' }}">Asistentes</a></li>
                </ul>
            </nav>
        </header>
        
        <h2>@yield('title', 'Gestión de Eventos')</h2>
        
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        
        @yield('content')
        
    </div>
</body>
</html>