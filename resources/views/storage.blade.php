<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; line-height: 1.6; }
        .form-group { margin-bottom: 15px; }
        button { background-color: #4F46E5; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .success-box { background-color: #DEF7EC; color: #03543F; padding: 15px; border-radius: 4px; margin-top: 20px; word-break: break-all; }
        a { color: #1A56DB; font-weight: bold; }
    </style>
</head>
<body>

    <h1>{{ $title }}</h1>
    <p>Sube un archivo directamente a Google Cloud Storage desde Laravel 12.</p>

    <form action="/storage" method="POST" enctype="multipart/form-data">
        @csrf 
        
        <div class="form-group">
            <label for="file">Selecciona un archivo:</label><br><br>
            <input type="file" name="file" id="file" required>
        </div>
        
        <button type="submit">Subir a GCS</button>
    </form>

    @if($signed_url)
        <div class="success-box">
            <h3>¡Archivo subido con éxito!</h3>
            <p>Puedes verlo aquí de forma pública:</p>
            <a href="{{ $signed_url }}" target="_blank">{{ $signed_url }}</a>
        </div>
    @endif

</body>
</html>
