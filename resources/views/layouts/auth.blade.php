<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Seu Projeto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <style>
        :root {
            --primary-color: #0d47a1; /* azul forte */
            --primary-hover: #1565c0;
            --background-color: #e8f0fe; /* azul clarinho */
            --container-bg: #ffffff;
            --error-bg: #fdecea;
            --error-border: #f5c6cb;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            max-width: 420px;
            margin: 70px auto;
            padding: 30px 35px;
            background-color: var(--container-bg);
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        input.form-control {
            border-radius: 6px;
            border: 1.5px solid #ccc;
            transition: border-color 0.3s ease;
        }
        input.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 8px rgba(13, 71, 161, 0.3);
        }

        button.btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 6px;
            font-weight: 600;
            padding: 10px 0;
            font-size: 1.05rem;
            width: 100%;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        button.btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .alert-danger {
            background-color: var(--error-bg);
            border: 1.5px solid var(--error-border);
            color: #a94442;
            border-radius: 6px;
            padding: 15px 20px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        p.mt-3 {
            text-align: center;
            font-size: 0.95rem;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>@yield('title')</h2>
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
