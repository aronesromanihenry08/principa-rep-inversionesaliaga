<?php
use App\Http\Controllers\PaginaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\MovimientoCajaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\Admin\PerfilAdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\NotificacionClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use Pusher\Pusher;

// RUTAS PÚBLICAS
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/notificaciones/cliente', [NotificacionClienteController::class, 'index'])->name('notificaciones.notificliente');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// RUTAS CRÍTICAS CON RATE LIMITING
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});

// RUTAS DE ADMIN
Route::middleware(['auth', 'checkRol:admin,gerente,cajero,vendedor', 'throttle:30,1'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos');
    Route::post('/admin/pedidos/{id}/actualizar', [PedidoController::class, 'updatePedido'])->name('admin.pedidos.update');
    Route::get('/admin/notificaciones', [HeaderController::class, 'notificaciones'])->name('admin.notificaciones');
    Route::get('/admin/productos', [AdminController::class, 'productos'])->name('admin.productos');
    Route::get('/admin/ventas', [AdminController::class, 'ventas'])->name('admin.ventas');
    Route::get('/admin/reportes', [AdminController::class, 'reportes'])->name('admin.reportes');
    Route::get('/admin/ingresos-egresos', [MovimientoCajaController::class, 'index'])->name('admin.ingresosEgresos');
    Route::post('/admin/movimientos', [MovimientoCajaController::class, 'store'])->name('admin.movimientos.store');
    
    Route::get('/productos', [AdminController::class, 'productoedit'])->name('productos.index');
    Route::post('/productos', [AdminController::class, 'store'])->name('productos.store');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::put('/productos/{id}/reactivar', [ProductoController::class, 'reactivar'])->name('productos.reactivar');
});

// CARRITO
Route::get('/carrito', function () {
    return view('carrito.carritocliente');
})->name('carrito.carritocliente');

Route::get('/productos/filtrar', [ProductoController::class, 'filtrar'])->name('productos.filtrar');

// API CARRITO
Route::post('/api/carrito/guardar-sesion', [CarritoController::class, 'guardarSesion'])->name('api.carrito.guardar-sesion');
Route::post('/api/carrito/guardar-checkout', [CarritoController::class, 'guardarCheckout'])->name('api.carrito.guardar-checkout');

Route::middleware(['auth'])->group(function () {
    Route::post('/api/carrito/sincronizar', [CarritoController::class, 'sincronizar'])->name('api.carrito.sincronizar');
    Route::post('/api/carrito/sincronizar-post-login', [CarritoController::class, 'sincronizarPostLogin'])->name('api.carrito.sincronizar-post-login');
    Route::get('/api/carrito/obtener', [CarritoController::class, 'obtener'])->name('api.carrito.obtener');
    Route::delete('/api/carrito/item/{productoId}', [CarritoController::class, 'eliminarItem']);
    Route::put('/api/carrito/item/{productoId}', [CarritoController::class, 'actualizarCantidad']);
});

// RUTAS DE USUARIO AUTENTICADO
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil');
    Route::post('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    Route::get('/notificaciones/cliente', [NotificacionClienteController::class, 'index'])->name('notificaciones.notificliente');
});

// CHECKOUT
Route::middleware(['throttle:10,1'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.checkoutcl');
    Route::post('/checkout/pago', [CheckoutController::class, 'procesarPago'])->name('checkout.checkoutpagos');
    Route::post('/checkout/procesar', [CheckoutController::class, 'procesarCompra'])->name('checkout.procesar');
});

// ADMIN PERFIL
Route::middleware(['auth', 'checkRol:admin,gerente,cajero,vendedor'])->group(function () {
    Route::get('/admin/perfil', [PerfilAdminController::class, 'edit'])->name('perfiladm.perfildeadmn');
    Route::post('/admin/perfil', [PerfilAdminController::class, 'update'])->name('perfiladm.perfildeadmnupdate');
    Route::post('/admin/usuarios', [PerfilAdminController::class, 'store'])->name('usuarios.store');
    Route::post('/admin/usuarios/{id}', [PerfilAdminController::class, 'updateUser'])->name('usuarios.update');
    Route::post('/admin/usuarios/{id}/toggle', [PerfilAdminController::class, 'toggleStatus'])->name('usuarios.toggle');
    Route::get('/admin/ventas', [VentaController::class, 'index'])->name('admin.ventas');
    Route::post('/admin/ventas', [VentaController::class, 'storeCompleta'])->name('ventas.store');
    Route::post('/admin/devoluciones', [VentaController::class, 'storeDevolucion'])->name('devoluciones.store');
    Route::get('/admin/productos/{id}', [VentaController::class, 'obtenerProducto'])->name('productos.obtener'); 
});

// LOGOUT
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// AVISOS
Route::get('/admin/avisos', [AvisoController::class, 'index'])->name('avisos.index');
Route::post('/admin/avisos/guardar', [AvisoController::class, 'guardar'])->name('avisos.guardar');
Route::get('/admin/avisos/eliminar/{id}', [AvisoController::class, 'eliminar'])->name('avisos.eliminar');
Route::post('/admin/avisos', [AvisoController::class, 'guardar'])->name('avisos.store');
Route::delete('/admin/avisos/{id}', [AvisoController::class, 'eliminar'])->name('avisos.destroy');

// 🔥 RUTAS DE PAGO Y WEBHOOKS - CORREGIDAS
Route::post('/checkout/procesar', [CheckoutController::class, 'procesarCompra'])->name('checkout.procesar');
Route::post('/checkout/qr', [PagoController::class, 'generarQR'])->name('checkout.qr');

// WEBHOOKS - EXCLUIDOS DE CSRF
Route::withoutMiddleware(['web'])->group(function () {
    // Webhook principal
    Route::post('/webhook/mercadopago', [PagoController::class, 'webhookMercadoPago'])
        ->name('webhook.mercadopago');
    
    // Ruta de debug
    Route::post('/webhook/debug', function(Request $request) {
        Log::info('WEBHOOK DEBUG RECIBIDO', $request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Debug funcionando',
            'data_received' => $request->all(),
            'timestamp' => now()->toISOString()
        ]);
    });
});

// RUTAS DE RETORNO DE MERCADO PAGO
Route::get('/pago/exito', [PagoController::class, 'pagoExitoso'])->name('pago.exito');
Route::get('/pago/error', [PagoController::class, 'pagoError'])->name('pago.error');
Route::get('/pago/pendiente', [PagoController::class, 'pagoPendiente'])->name('pago.pendiente');

// API ADICIONALES
Route::get('/api/distritos', [App\Http\Controllers\DistritoController::class, 'obtenerDistritos']);
Route::get('/api/producto/{id}/stock', function($id) {
    $producto = \App\Models\Producto::find($id);
    
    if (!$producto) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }
    
    return response()->json([
        'stock_total' => $producto->stock_producto,
        'stock_disponible' => $producto->stock_producto,
        'puede_aumentar_hasta' => min(10, $producto->stock_producto)
    ]);
});

// RUTAS PARA SIMULAR VENTAS
Route::get('/ventas/simular-online', [VentaController::class, 'simularOnline'])->name('ventas.simular-online');
Route::post('/ventas/simular-online', [VentaController::class, 'procesarVentaOnline'])->name('ventas.simular-online.procesar');

// RUTAS PARA NUEVO SISTEMA DE VENTAS
Route::get('/admin/buscar-productos', [VentaController::class, 'buscarProductos'])->name('ventas.buscar-productos');
Route::get('/admin/buscar-clientes', [VentaController::class, 'buscarClientes'])->name('ventas.buscar-clientes');
Route::get('/admin/clientes/{id}', [VentaController::class, 'obtenerCliente'])->name('ventas.obtener-cliente');
Route::post('/ventas', [VentaController::class, 'storeCompleta'])->name('ventas.store');

// REPORTES
Route::middleware(['auth', 'checkRol:admin,gerente,cajero,vendedor'])->group(function () {
    Route::get('/api/reportes/pedidos', [ReporteController::class, 'obtenerPedidos']);
    Route::get('/api/reportes/ventas', [ReporteController::class, 'obtenerVentas']);
    Route::get('/api/reportes/inventario', [ReporteController::class, 'obtenerInventario']);
    Route::get('/api/reportes/clientes', [ReporteController::class, 'obtenerClientes']);
    Route::get('/api/reportes/top-productos', [ReporteController::class, 'obtenerTopProductos']);
    Route::get('/api/reportes/estadisticas', [ReporteController::class, 'obtenerEstadisticas']);
});

// DASHBOARD
Route::middleware(['auth', 'checkRol:admin,gerente,cajero,vendedor'])->group(function () {
    Route::get('/api/dashboard/estadisticas', [DashboardController::class, 'estadisticas']);
    Route::get('/api/dashboard/pedidos-recientes', [DashboardController::class, 'pedidosRecientes']);
    Route::get('/api/dashboard/stock-bajo', [DashboardController::class, 'stockBajo']);
});

// Ruta para procesar cola manualmente (ejecutar cada 1 minuto)
Route::get('/procesar-cola', [PagoController::class, 'procesarCola']);

// 🔥 RUTA DE PRUEBA PÚBLICA - ELIMINAR DESPUÉS
Route::post('/webhook/test-public', function(Request $request) {
    $logFile = storage_path('logs/webhook_test.log');
    $timestamp = date('Y-m-d H:i:s');
    
    file_put_contents($logFile, "\n\n[$timestamp] 🧪 ===== TEST PÚBLICO =====\n", FILE_APPEND | LOCK_EX);
    file_put_contents($logFile, "[$timestamp] 📦 CONTENIDO: " . $request->getContent() . "\n", FILE_APPEND | LOCK_EX);
    file_put_contents($logFile, "[$timestamp] 🌐 IP: " . $request->ip() . "\n", FILE_APPEND | LOCK_EX);
    
    return response()->json([
        'status' => 'success', 
        'message' => 'Test público funcionando',
        'timestamp' => $timestamp
    ]);
});

// Ruta GET para probar manualmente
Route::get('/webhook/test-get', function() {
    $logFile = storage_path('logs/webhook_test.log');
    $timestamp = date('Y-m-d H:i:s');
    
    file_put_contents($logFile, "\n\n[$timestamp] 🧪 ===== TEST GET MANUAL =====\n", FILE_APPEND | LOCK_EX);
    
    return response()->json([
        'status' => 'success', 
        'message' => 'Test GET funcionando',
        'timestamp' => $timestamp
    ]);
});

// Ruta para servir imágenes de productos
Route::get('/img/products/{filename}', [ImageController::class, 'serveProductImage'])
    ->where('filename', '.*')
    ->name('images.products');
    
// Ruta para descargar boleta
Route::get('/ventas/{id}/datos-boleta', [VentaController::class, 'obtenerDatosBoleta'])->name('ventas.datos-boleta');

Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('paginas.nosotros');

Route::get('/catalogo', [PaginaController::class, 'catalogo'])->name('paginas.catalogo');



Route::get('/test-pusher', function () {
    $options = [
        'cluster' => env('PUSHER_APP_CLUSTER'),
        'useTLS' => true
    ];
    
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );

    try {
        // Intentamos enviar a un canal público llamado 'test-channel'
        // El evento se llama 'test-event'
        $result = $pusher->trigger('test-channel', 'test-event', ['message' => 'Hola desde Laravel']);
        
        return [
            'resultado' => $result, // Si es true, Pusher recibió el mensaje
            'config_usada' => [
                'app_id' => env('PUSHER_APP_ID'),
                'cluster' => env('PUSHER_APP_CLUSTER')
            ]
        ];
    } catch (\Exception $e) {
        return "ERROR TOTAL: " . $e->getMessage();
    }
});
require __DIR__.'/auth.php';
