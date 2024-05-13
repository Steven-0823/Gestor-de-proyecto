<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a Gestión de proyectos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Esto hace que el cuerpo ocupe el 100% del alto de la ventana */
    }
    .container {
      max-width: 800px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      text-align: center; /* Alineación central del contenido */
    }
    h1 {
      font-size: 36px;
      color: #333;
      margin-bottom: 20px;
    }
    p {
      font-size: 18px;
      color: #666;
      margin-bottom: 30px;
    }
    .btn-container {
      display: flex;
      justify-content: center; /* Centrar horizontalmente los botones */
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 18px;
      color: #fff;
      text-decoration: none;
      border: none;
      border-radius: 25px;
      transition: background-color 0.3s ease;
    }
    .btn-primary {
      background-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .btn-secondary {
      background-color: #6c757d;
      margin-left: 10px;
    }
    .btn-secondary:hover {
      background-color: #495057;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Bienvenido a la app para gestionar tus proyectos</h1>
    <p>Explora y disfruta de todo lo que tengo para ofrecerte.</p>
    <div class="btn-container">
      <a href="/login" class="btn btn-primary">Iniciar Sesión</a>
      <a href="/register" class="btn btn-secondary">Registrarse</a>
    </div>
  </div>

</body>
</html>
