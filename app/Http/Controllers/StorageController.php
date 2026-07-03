<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;

class StorageController extends Controller
{
    // Equivalente a @app.route("/")


    // Equivalente a @app.route("/storage", methods=["GET", "POST"])
    public function storageRoute(Request $request)
    {
        $publicUrl = null;

        // Si es una petición POST y el archivo existe
        if ($request->isMethod('post') && $request->hasFile('file')) {
            $file = $request->file('file');

            // Leer las variables de entorno (como os.environ.get)
            $bucketName = env('GCS_BUCKET_NAME', 'my-gcs-bucket');

            // Instanciar el cliente de Google Cloud Storage
            $storage = new StorageClient();
            $bucket = $storage->bucket($bucketName);

            // Obtener el nombre original del archivo y su ruta temporal
            $fileName = $file->getClientOriginalName();
            $filePath = $file->getRealPath();

            // Subir el archivo a GCS (Equivalente a blob.upload_from_file)
            $bucket->upload(
                fopen($filePath, 'r'),
                ['name' => $fileName]
            );

            // Construir la URL pública estándar f-string
            $publicUrl = "https://storage.googleapis.com/{$bucketName}/{$fileName}";
        }

        // Retorna la vista pasando la variable (Equivalente a render_template)
        return view('storage', [
            'title' => 'Equisd - Storage',
            'signed_url' => $publicUrl
        ]);
    }
}
