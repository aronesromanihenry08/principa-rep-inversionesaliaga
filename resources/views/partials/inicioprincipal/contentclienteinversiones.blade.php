<style>
    /* --- ESTILOS VISUALES PREMIUM MEJORADOS --- */
    
    /* Animaciones */
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes pulse-subtle {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    .animate-item { animation: fade-in-up 0.5s ease-out forwards; opacity: 0; } /* Opacity 0 para efecto cascade */
    
    /* Notificaciones */
    .toast-notification {
        position: fixed; bottom: 30px; left: 50%;
        transform: translateX(-50%) translateY(100px);
        background: #1F2937; color: white;
        padding: 12px 24px; border-radius: 50px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 9999; opacity: 0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex; align-items: center; gap: 10px; font-weight: 500;
    }
    .toast-notification.show { opacity: 1; transform: translateX(-50%) translateY(0); }

    /* Tarjetas con animación mejorada */
    .product-card-premium {
        background: white; border-radius: 20px; overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        border: 1px solid rgba(243, 244, 246, 0.8);
        position: relative;
    }
    
    .product-card-premium::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        border-radius: 20px;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
        pointer-events: none;
    }

    .product-card-premium:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -15px rgba(31, 41, 55, 0.15); /* Sombra con color base */
    }
    
    .product-card-premium:hover::before {
        border-color: #1F2937; /* Color base en borde */
    }
    
    .product-card-premium img { transition: transform 0.5s ease; }
    .product-card-premium:hover img { transform: scale(1.05); }

    /* Etiquetas de Stock */
    .badge-stock {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .badge-stock-default {
        background-color: #F3F4F6;
        color: #6B7280;
    }
    
    .badge-stock-low {
        background-color: #FEF3C7; /* Amber 100 */
        color: #D97706; /* Amber 600 */
        animation: pulse-subtle 2s infinite;
        border: 1px solid #FCD34D;
    }
    
    .badge-stock-out {
        background-color: #FEE2E2; /* Red 100 */
        color: #DC2626; /* Red 600 */
    }

    /* Navbars */
.navbar-white {
    background-color: white; 
    padding: 20px 0;
    /* Líneas arriba y abajo */
    border-top: 2px solid rgba(31, 41, 55, 1);
    border-bottom: 2px solid rgba(31, 41, 55, 1);
    /* Opcional: un toque de sombra interna para dar profundidad */
}
    .pill-white {
        padding: 8px 20px; font-size: 0.85rem; font-weight: 600;
        color: #4B5563; background: #f9fafb;
        border-radius: 20px; transition: all 0.25s ease; cursor: pointer;
        border: 1px solid transparent;
        box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    }
    .pill-white:hover { 
        background: #1F2937; color: white; 
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    /* Galería de Imágenes */
    .gallery-navbar {
        background-color: white; padding: 40px 0; overflow: hidden;
    }
    .gallery-item-large {
        width: 160px; height: 160px; margin: 0 15px;
        flex-shrink: 0; position: relative; cursor: pointer;
    }
    .gallery-item-large img {
        width: 100%; height: 100%; object-fit: cover;
        border-radius: 20px; 
        border: 2px solid #f3f4f6;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); /* Curva premium */
        background: #f9fafb;
        backface-visibility: hidden;
    }

    .gallery-item-large:hover img {
        transform: scale(1.15); 
        border-color: #1F2937; 
        box-shadow: 0 20px 40px rgba(31, 41, 55, 0.15);
    }

    /* Títulos de Sección */
    .section-header {
        display: flex; flex-direction: column; align-items: center;
        margin: 60px 0 40px; text-align: center;
    }
    .section-header .line {
        width: 60px; height: 3px; background-color: #1F2937; /* Color base */
        border-radius: 2px;
        transition: width 0.3s ease;
    }
    .section-header:hover .line {
        width: 80px;
    }
    .section-header h3 {
        margin: 15px 0; font-size: 1.4rem; font-weight: 700;
        color: #111827; letter-spacing: 0.05em; text-transform: uppercase;
    }

    /* Modal */
    .modal-compact-wrapper {
        position: fixed; inset: 0; z-index: 100;
        display: none; align-items: center; justify-content: center;
        padding: 1rem; background: rgba(0,0,0,0.4);
        backdrop-filter: blur(5px);
    }
    .modal-compact-body {
        background: white; width: 100%; max-width: 600px;
        border-radius: 24px; overflow: hidden; display: flex;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        animation: fade-in-up 0.3s ease-out;
    }
    @media (max-width: 640px) {
        .modal-compact-body { flex-direction: column; max-height: 90vh; }
        .modal-compact-body .img-side { width: 100%; height: 220px; }
    }
    .modal-compact-body .img-side {
        width: 45%; background: #f9fafb;
        display: flex; align-items: center; justify-content; center; padding: 20px;
    }
    .modal-compact-body .img-side img { max-width: 90%; max-height: 90%; object-fit: contain; }
    .modal-compact-body .content-side { flex: 1; padding: 24px; position: relative; display: flex; flex-direction: column; }

    /* Botones */
    .btn-add-cart {
        background: #1F2937; color: white; border-radius: 999px;
        padding: 8px 20px; font-size: 0.8rem; font-weight: 600;
        transition: all 0.2s ease; border: none; outline: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .hr-premium {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(31, 41, 55, 0), rgba(31, 41, 55, 0.3), rgba(31, 41, 55, 0));
        margin: 50px auto;
        width: 100%;
    }
    
    .btn-add-cart:hover { 
        background: black; 
        transform: translateY(-1px); 
        box-shadow: 0 6px 10px -1px rgba(0, 0, 0, 0.15);
    }
    .btn-add-cart:active { transform: translateY(0); }
    
    .btn-add-cart:disabled { 
        background: #e5e7eb; color: #9ca3af; cursor: default; 
        transform: none; box-shadow: none; 
    }
    /* --- BOTÓN FLOTANTE WHATSAPP PREMIUM --- */
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 30px;
        right: 30px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .whatsapp-float:hover {
        transform: scale(1.1) translateY(-5px);
        background-color: #128C7E;
        box-shadow: 0 15px 30px rgba(37, 211, 102, 0.4);
        color: white;
    }

    /* Animación de entrada igual a tus items */
    .whatsapp-float {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    /* Marquee */
    .marquee-wrapper { overflow: hidden; white-space: nowrap; padding: 20px 0;}
    .marquee-content { display: inline-flex; animation: scroll-smooth 35s linear infinite; }
    .marquee-wrapper:hover .marquee-content { animation-play-state: paused; }
    @keyframes scroll-smooth { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
</style>

<!-- FILTROS -->
<div class="flex flex-wrap items-center gap-3 mb-8 mt-2 px-2 bg-white rounded-xl p-3 shadow-sm border border-gray-100">
    <div class="relative flex-1 min-w-[180px]">
        <select id="filtroCategoria" class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg pl-10 pr-8 py-2 w-full focus:outline-none focus:ring-1 focus:ring-gray-300 transition cursor-pointer">
            <option value="">Todas las categorías lateanas</option>
            @foreach($categorias as $categoria) <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_cat }}</option> @endforeach
        </select>
        <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
    </div>
    <div class="relative flex-1 min-w-[150px]">
        <select id="filtroPrecio" class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg pl-10 pr-8 py-2 w-full focus:outline-none focus:ring-1 focus:ring-gray-300 transition cursor-pointer">
            <option value="">Todos los precios</option>
            <option value="1">- de S/ 100</option>
            <option value="2">S/ 100 - S/ 500</option>
            <option value="3">S/ 500 - S/ 1000</option>
            <option value="4">+ de S/ 1000</option>
        </select>
        <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6 1a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    </div>
    <button id="limpiarFiltros" class="flex items-center gap-2 text-gray-500 hover:text-red-500 text-sm transition px-3 py-2 rounded-lg hover:bg-red-50 font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        Limpiar
    </button>
    <div class="ml-auto flex gap-2">
        <button id="Nosotros" onclick="window.location.href='{{ route('paginas.nosotros') }}'" class="text-gray-500 hover:text-gray-800 text-sm font-medium transition px-4 py-2 rounded-lg hover:bg-gray-50 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
            Nosotros
        </button>
        <button id="Catalogo" onclick="window.location.href='{{ route('paginas.catalogo') }}'" class="bg-gray-800 text-white px-5 py-2 rounded-lg text-sm flex items-center gap-2 shadow-sm hover:bg-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg>
            Catálogo
        </button>
    </div>
</div>

<!-- SLIDER -->
<div x-data="slider()" class="relative w-full overflow-hidden rounded-2xl shadow-sm mb-10" style="aspect-ratio: 1920 / 600;" @mouseenter="stop()" @mouseleave="start()">
    <div class="flex transition-transform duration-700 ease-in-out h-full" :style="`transform: translateX(-${currentIndex * 100}%);`">
        <template x-for="(image, index) in images" :key="index">
            <div class="flex-none w-full h-full relative">
                <img :src="image" class="w-full h-full object-cover object-center" alt="Slide">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
        </template>
    </div>
    <button @click="prev()" class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-md backdrop-blur-sm transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg></button>
    <button @click="next()" class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-md backdrop-blur-sm transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
</div>

<!-- NAVBAR NOMBRES -->
<div class="navbar-white my-12">
    <div class="marquee-wrapper">
        <div class="marquee-content gap-3">
            @php $allProds = $productosPorCategoria->flatten(1); $loopProds = $allProds->concat($allProds); @endphp
            @foreach($loopProds as $p)
                @if($p->stock_producto > 0)
                    <button class="pill-white" onclick="abrirModalProducto({{ $p->id_producto }}, '{{ addslashes($p->nombre_producto) }}', {{ $p->precio_producto }}, '{{ addslashes($p->descripcion_producto) }}', '{{ $p->imagen }}', {{ $p->stock_producto }})">
                        {{ $p->nombre_producto }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- CONTENEDOR DE PRODUCTOS -->
<div id="contenedor-productos">
   <!-- El JS inyectará el contenido aquí -->
</div>

<hr class="hr-premium">

<!-- NAVBAR IMÁGENES -->
<div class="gallery-navbar my-16">
    <div class="marquee-wrapper">
        <div class="marquee-content">
            @foreach($loopProds as $p)
                @if($p->stock_producto > 0 && $p->estado_producto == 'disponible')
                    <div class="gallery-item-large" onclick="abrirModalProducto({{ $p->id_producto }}, '{{ addslashes($p->nombre_producto) }}', {{ $p->precio_producto }}, '{{ addslashes($p->descripcion_producto) }}', '{{ $p->imagen }}', {{ $p->stock_producto }})">
                        @if($p->imagen)
                            <img src="{{ route('images.products', ['filename' => basename($p->imagen)]) }}" alt="{{ $p->nombre_producto }}">
                        @else
                            <img src="https://via.placeholder.com/160/f3f4f6/9ca3af?text=Img" alt="Sin imagen">
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<hr class="hr-premium">

<!-- MODAL COMPACTO -->
<div id="modal-producto" class="modal-compact-wrapper" onclick="cerrarModalProducto()">
    <div class="modal-compact-body" onclick="event.stopPropagation()">
        <div class="img-side">
            <img id="modal-imagen" src="" alt="">
        </div>
        <div class="content-side">
            <button onclick="cerrarModalProducto()" class="absolute top-4 right-4 text-gray-300 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex-grow">
                <span id="modal-categoria" class="text-xs font-bold text-blue-600 uppercase tracking-widest"></span>
                <h2 id="modal-nombre" class="text-2xl font-bold text-gray-900 mt-2 mb-3"></h2>
                <p id="modal-descripcion" class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3"></p>
            </div>
            <div class="mt-auto border-t pt-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-2xl font-bold text-gray-900" id="modal-precio"></span>
                    <span id="modal-stock" class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full"></span>
                </div>
                <button id="modal-btn-agregar" onclick="agregarDesdeModal()" class="w-full bg-gray-900 text-white py-3 rounded-xl font-semibold hover:bg-black transition-all duration-200 shadow-lg">
                    Agregar al carrito
                </button>
            </div>
        </div>
    </div>
</div>
<a href="https://wa.me/51944229830?text=Hola!%20Vengo%20de%20la%20web%20y%20quisiera%20más%20información" 
   class="whatsapp-float" 
   target="_blank" 
   rel="noopener noreferrer">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.06 3.965l-1.127 4.12 4.212-1.105a7.863 7.863 0 0 0 3.793.974h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
    </svg>
</a>
<script>
// ==========================================
// LÓGICA VISUAL Y FUNCIONALIDAD
// ==========================================

let productoModalActual = { id: null, nombre: '', precio: 0, descripcion: '', imagen: '', stock: 0 };

function abrirModalProducto(id, nombre, precio, descripcion, imagen, stock, marca, categoria) {
    productoModalActual = { id, nombre, precio, descripcion, imagen, stock };
    document.getElementById('modal-nombre').textContent = nombre;
    document.getElementById('modal-descripcion').textContent = descripcion || 'Sin descripción.';
    document.getElementById('modal-precio').textContent = 'S/ ' + parseFloat(precio).toFixed(2);
    document.getElementById('modal-categoria').textContent = categoria;
    const imgEl = document.getElementById('modal-imagen');
    if (imagen) { imgEl.src = '/img/products/' + imagen.split('/').pop(); imgEl.style.display = 'block'; } 
    else { imgEl.style.display = 'none'; }
    const stockEl = document.getElementById('modal-stock');
    const btnAgregar = document.getElementById('modal-btn-agregar');
    
    // Lógica visual del stock dentro del modal
    if (stock <= 0) { 
        stockEl.textContent = 'Agotado'; 
        stockEl.className = 'badge-stock badge-stock-out'; 
        btnAgregar.style.display = 'none'; 
    } else if (stock <= 5) { 
        stockEl.textContent = '¡Últimas ' + stock + ' unidades!'; 
        stockEl.className = 'badge-stock badge-stock-low'; 
        btnAgregar.style.display = 'block'; 
    } else { 
        stockEl.textContent = 'Disponible: ' + stock; 
        stockEl.className = 'badge-stock badge-stock-default'; 
        btnAgregar.style.display = 'block'; 
    }
    
    document.getElementById('modal-producto').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function cerrarModalProducto() { document.getElementById('modal-producto').style.display = 'none'; document.body.style.overflow = ''; }
function agregarDesdeModal() { agregarAlCarrito(productoModalActual.id, productoModalActual.nombre, productoModalActual.precio, productoModalActual.descripcion, productoModalActual.imagen, productoModalActual.stock); cerrarModalProducto(); }

// ==========================================
// LÓGICA ORIGINAL INTACTA
// ==========================================

function agregarAlCarrito(productoId, nombre, precio, descripcion = '', imagen = '', stock = 1) {
    let carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
    if (stock <= 0) { mostrarNotificacion('🚫 Producto agotado'); return; }
    
    const boton = event?.target;
    let botonOriginal = '';
    if (boton) {
        botonOriginal = boton.innerHTML;
        boton.innerHTML = '✓';
        boton.disabled = true;
        boton.classList.add('opacity-75');
    }
    
    const productoExistente = carrito.find(item => item.id === productoId);
    if (productoExistente) {
        mostrarNotificacion('🛒 Ya está en el carrito');
        if (boton) { setTimeout(() => { boton.innerHTML = botonOriginal; boton.disabled = false; boton.classList.remove('opacity-75'); }, 2000); }
        return;
    } else {
        if (stock < 1) return;
        const nuevoProducto = { id: productoId, nombre: nombre, precio: precio, descripcion: descripcion, imagen: imagen, cantidad: 1, stock: stock };
        carrito.push(nuevoProducto);
        mostrarNotificacion(`✅ ${nombre} agregado al carrito`);
    }
    
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarContadorCarrito();

    @auth
    setTimeout(() => {
        const _csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        fetch('/api/carrito/sincronizar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': _csrfToken, 'X-Requested-With': 'XMLHttpRequest' },
            credentials: 'same-origin',
            body: JSON.stringify({ carrito: carrito })
        })
        .then(response => response.json())
        .then(data => { if (data.success) console.log('Sincronizado'); })
        .catch(error => console.error('Error:', error));
    }, 100);
    @endauth
}

function mostrarNotificacion(mensaje) {
    const existing = document.querySelector('.toast-notification'); if(existing) existing.remove();
    const n = document.createElement('div');
    n.className = 'toast-notification';
    n.innerHTML = `<svg class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> ${mensaje}`;
    document.body.appendChild(n);
    void n.offsetWidth; n.classList.add('show');
    setTimeout(() => { n.classList.remove('show'); setTimeout(() => n.remove(), 400); }, 3000);
}

function actualizarContadorCarrito() {
    const carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
    const totalItems = carrito.reduce((total, item) => total + item.cantidad, 0);
    const contador = document.getElementById('contador-carrito');
    if (contador) { contador.textContent = totalItems; contador.classList.toggle('hidden', totalItems === 0); }
}

// Generador de HTML con STOCK visible
function generarHTMLProducto(p) {
    // Determinar clase y texto del stock
    let stockHTML = '';
    if (p.stock_producto <= 0) {
        stockHTML = '<span class="badge-stock badge-stock-out">Agotado</span>';
    } else if (p.stock_producto <= 5) {
        stockHTML = `<span class="badge-stock badge-stock-low">¡Solo ${p.stock_producto} disponibles!</span>`;
    } else {
        stockHTML = `<span class="badge-stock badge-stock-default">Stock: ${p.stock_producto}</span>`;
    }

    const btn = p.stock_producto > 0 
        ? `<button onclick="event.stopPropagation(); agregarAlCarrito(${p.id_producto}, '${escapeHtml(p.nombre_producto)}', ${p.precio_producto}, '${escapeHtml(p.descripcion_producto || '')}', '${p.imagen || ''}', ${p.stock_producto})" class="btn-add-cart">Agregar al carrito</button>`
        : ''; // Botón oculto si está agotado

    return `
    <div class="product-card-premium flex flex-col h-full cursor-pointer group animate-item" onclick="abrirModalProducto(${p.id_producto}, '${escapeHtml(p.nombre_producto)}', ${p.precio_producto}, '${escapeHtml(p.descripcion_producto || '')}', '${p.imagen || ''}', ${p.stock_producto})">
        <div class="aspect-square bg-gray-50 flex items-center justify-center overflow-hidden p-6">
            ${p.imagen ? 
                `<img src="/img/products/${p.imagen.split('/').pop()}" class="w-full h-full object-contain">`
                : `<div class="w-full h-full flex items-center justify-center text-gray-300"><svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>`}
        </div>
        <div class="p-5 flex flex-col flex-grow bg-white">
            <h3 class="text-sm font-semibold text-gray-800 mb-1 line-clamp-2 h-10">${p.nombre_producto}</h3>
            ${p.marca ? `<span class="text-xs text-gray-400 mb-2 block">${p.marca}</span>` : '<div class="mb-2"></div>'}
            
            <!-- STOCK INDICATOR -->
            <div class="mb-2 flex justify-end">
                ${stockHTML}
            </div>

            <div class="mt-auto flex justify-between items-center pt-2 border-t border-gray-100">
                <span class="text-xl font-bold text-gray-900">S/ ${parseFloat(p.precio_producto).toFixed(2)}</span>
                ${btn}
            </div>
        </div>
    </div>`;
}

function escapeHtml(text = '') {
    if (!text) return '';
    return text.replace(/'/g, "\\'").replace(/"/g, '\\"').replace(/\n/g, '\\n').replace(/\r/g, '\\r');
}

document.addEventListener('DOMContentLoaded', function() {
    actualizarContadorCarrito();
    actualizarEstadoBotones(); 

    const categoriaSelect = document.getElementById('filtroCategoria');
    const precioSelect = document.getElementById('filtroPrecio');
    const limpiarBtn = document.getElementById('limpiarFiltros');
    const buscadorHeader = document.querySelector('header input[type="text"]');

    function debounce(fn, wait = 350) { let t; return (...args) => { clearTimeout(t); t = setTimeout(() => fn.apply(this, args), wait); }; }

    async function cargarProductos() {
        const categoria = categoriaSelect ? categoriaSelect.value : '';
        const precio = precioSelect ? precioSelect.value : '';
        const busqueda = buscadorHeader ? buscadorHeader.value.trim() : '';

        const params = new URLSearchParams();
        if (busqueda !== '') params.set('buscar', busqueda);
        if (categoria !== '') params.set('categoria', categoria);
        if (precio !== '') params.set('precio', precio);

        try {
            const res = await fetch(`/productos/filtrar?${params.toString()}`, { method: 'GET', credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
            if (!res.ok) return;
            const data = await res.json();
            const contenedorProductos = document.getElementById('contenedor-productos');
            if (!contenedorProductos) return;

            if (data.productos && data.productos.length > 0) {
                const productosPorCategoria = {};
                data.productos.forEach(p => {
                    const catId = p.categoria ? p.categoria.id_categoria : 'sin';
                    if (!productosPorCategoria[catId]) productosPorCategoria[catId] = [];
                    productosPorCategoria[catId].push(p);
                });

                let html = '';
                
                // 1. FILTRO DE CATEGORÍA ACTIVO
                if (categoria && !busqueda && !precio) {
                    const catId = categoria;
                    const prods = productosPorCategoria[catId] || [];
                    const catName = prods[0]?.categoria?.nombre_cat || 'Categoría';
                    
                    html += `
                    <div class="section-header">
                        <div class="line"></div>
                        <h3>${catName}</h3>
                        <div class="line"></div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">`;
                    
                    prods.forEach(p => { html += generarHTMLProducto(p); });
                    html += '</div>';
                }
                // 2. BÚSQUEDA O FILTRO DE PRECIO
                else if (busqueda || precio) {
                     html += `
                    <div class="section-header">
                        <div class="line"></div>
                        <h3>Resultados de Búsqueda</h3>
                        <div class="line"></div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">`;
                    data.productos.forEach(p => { html += generarHTMLProducto(p); });
                    html += '</div>';
                }
                // 3. SIN FILTROS (Agrupado por Categoría)
                else {
                    Object.keys(productosPorCategoria).forEach(catId => {
                        const prods = productosPorCategoria[catId];
                        const catName = prods[0]?.categoria?.nombre_cat || 'Sin Categoría';
                        
                        html += `
                        <div class="section-header">
                            <div class="line"></div>
                            <h3>${catName}</h3>
                            <div class="line"></div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">`;
                        
                        prods.forEach(p => { html += generarHTMLProducto(p); });
                        html += '</div>';
                    });
                }

                contenedorProductos.innerHTML = html;
                setTimeout(actualizarEstadoBotones, 100);
            } else {
                contenedorProductos.innerHTML = `<div class="text-center py-16 col-span-full"><h3 class="text-lg font-semibold text-gray-700 mb-1">No hay productos</h3></div>`;
            }
        } catch (err) { console.error('Error:', err); }
    }

    if (categoriaSelect) categoriaSelect.addEventListener('change', cargarProductos);
    if (precioSelect) precioSelect.addEventListener('change', cargarProductos);
    if (limpiarBtn) limpiarBtn.addEventListener('click', () => {
        if (categoriaSelect) categoriaSelect.value = '';
        if (precioSelect) precioSelect.value = '';
        if (buscadorHeader) buscadorHeader.value = '';
        cargarProductos();
    });
    if (buscadorHeader) buscadorHeader.addEventListener('input', debounce(cargarProductos, 400));

    cargarProductos();
});

function actualizarEstadoBotones() {
    const carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
    document.querySelectorAll('.btn-add-cart').forEach(boton => {
        const onclickText = boton.getAttribute('onclick');
        const match = onclickText ? onclickText.match(/agregarAlCarrito\((\d+),/) : null;
        if (match) {
            const productoId = parseInt(match[1]);
            const enCarrito = carrito.find(item => item.id === productoId);
            if (enCarrito) {
                boton.innerHTML = 'En carrito';
                boton.disabled = true;
                boton.classList.add('opacity-60');
                boton.removeAttribute('onclick');
            }
        }
    });
}

function slider() {
    return {
        images: ['/images/sliders/slider1.jpg', '/images/sliders/slider2.jpg', '/images/sliders/slider3.jpg'],
        currentIndex: 0, interval: null,
        next() { this.currentIndex = (this.currentIndex + 1) % this.images.length; },
        prev() { this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length; },
        start() { this.interval = setInterval(() => this.next(), 4500); },
        stop() { clearInterval(this.interval); },
        init() { this.start(); }
    }
}

// ==========================================
// MEJORA DE USABILIDAD - MODO BÚSQUEDA INMERSIVO (CORREGIDO)
// ==========================================
(function() {
    // Elementos que queremos ocultar durante la búsqueda/filtros
    const ELEMENTOS_A_OCULTAR = [
        '.relative.w-full.overflow-hidden',  // El SLIDER
        '.navbar-white',                      // El marquee con los nombres
        '.gallery-navbar',                     // La galería de imágenes
        '.hr-premium'                          // Las líneas divisorias
    ];
    
    // Función para ocultar/mostrar elementos
    function toggleElementosSecundarios(ocultar = true) {
        ELEMENTOS_A_OCULTAR.forEach(selector => {
            document.querySelectorAll(selector).forEach(el => {
                if (ocultar) {
                    // Guardamos el estado original SOLO si no está guardado
                    if (!el.dataset.originalDisplay) {
                        el.dataset.originalDisplay = window.getComputedStyle(el).display;
                    }
                    el.style.display = 'none';
                } else {
                    // Restauramos el estado original
                    if (el.dataset.originalDisplay) {
                        el.style.display = el.dataset.originalDisplay;
                    } else {
                        el.style.display = ''; // Valor por defecto
                    }
                }
            });
        });
    }
    
    // Función para verificar si hay filtros activos
    function hayFiltrosActivos() {
        const categoriaSelect = document.getElementById('filtroCategoria');
        const precioSelect = document.getElementById('filtroPrecio');
        const buscadorHeader = document.querySelector('header input[type="text"]');
        
        // También verificamos si hay algún valor en los filtros
        const categoriaActiva = categoriaSelect && categoriaSelect.value && categoriaSelect.value !== '';
        const precioActivo = precioSelect && precioSelect.value && precioSelect.value !== '';
        const busquedaActiva = buscadorHeader && buscadorHeader.value && buscadorHeader.value.trim() !== '';
        
        console.log('Verificando filtros:', { categoriaActiva, precioActivo, busquedaActiva }); // Para debug
        
        return categoriaActiva || precioActivo || busquedaActiva;
    }
    
    // Función para hacer scroll al inicio de los resultados
    function scrollToResultados() {
        const filtros = document.querySelector('.flex.flex-wrap.items-center.gap-3');
        if (filtros) {
            const rect = filtros.getBoundingClientRect();
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            window.scrollTo({
                top: rect.top + scrollTop + rect.height + 10,
                behavior: 'smooth'
            });
        }
    }
    
    // Función principal para actualizar la UI
    function actualizarUIPorFiltros() {
        const activos = hayFiltrosActivos();
        console.log('Filtros activos:', activos); // Para debug
        
        // Ocultamos o mostramos elementos según el estado
        toggleElementosSecundarios(activos);
        
        // Si hay filtros activos, hacemos scroll a los resultados
        if (activos) {
            setTimeout(scrollToResultados, 300);
        }
    }
    
    // Función para limpiar todos los filtros
    function limpiarTodosLosFiltros() {
        const categoriaSelect = document.getElementById('filtroCategoria');
        const precioSelect = document.getElementById('filtroPrecio');
        const buscadorHeader = document.querySelector('header input[type="text"]');
        
        // Limpiamos todos los filtros
        if (categoriaSelect) categoriaSelect.value = '';
        if (precioSelect) precioSelect.value = '';
        if (buscadorHeader) buscadorHeader.value = '';
        
        // Disparamos el evento de cambio para que la función original cargue los productos
        if (categoriaSelect) categoriaSelect.dispatchEvent(new Event('change'));
        
        // Pequeño retraso para asegurar que los productos se cargan
        setTimeout(function() {
            // Verificamos que no haya filtros activos
            if (!hayFiltrosActivos()) {
                // Mostramos todos los elementos
                toggleElementosSecundarios(false);
                
                // Hacemos scroll suave al contenedor de productos
                const contenedor = document.getElementById('contenedor-productos');
                if (contenedor) {
                    setTimeout(() => {
                        const rect = contenedor.getBoundingClientRect();
                        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                        window.scrollTo({
                            top: rect.top + scrollTop - 100,
                            behavior: 'smooth'
                        });
                    }, 200);
                }
            }
        }, 400);
    }
    
    // Esperamos a que el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const categoriaSelect = document.getElementById('filtroCategoria');
            const precioSelect = document.getElementById('filtroPrecio');
            const limpiarBtn = document.getElementById('limpiarFiltros');
            const buscadorHeader = document.querySelector('header input[type="text"]');
            
            // Función wrapper para manejar cambios
            function manejarCambioFiltro() {
                setTimeout(function() {
                    actualizarUIPorFiltros();
                }, 250);
            }
            
            // Añadimos listeners a los filtros
            if (categoriaSelect) {
                categoriaSelect.addEventListener('change', manejarCambioFiltro);
            }
            
            if (precioSelect) {
                precioSelect.addEventListener('change', manejarCambioFiltro);
            }
            
            if (buscadorHeader) {
                // Búsqueda con Enter
                buscadorHeader.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        setTimeout(manejarCambioFiltro, 150);
                    }
                });
                
                // Al perder el foco
                buscadorHeader.addEventListener('blur', function() {
                    if (this.value.trim() !== '') {
                        setTimeout(manejarCambioFiltro, 200);
                    }
                });
            }
            
            // IMPORTANTE: Reemplazamos el comportamiento del botón limpiar
            if (limpiarBtn) {
                // Eliminamos cualquier listener anterior (si existe)
                const nuevoBoton = limpiarBtn.cloneNode(true);
                limpiarBtn.parentNode.replaceChild(nuevoBoton, limpiarBtn);
                
                // Añadimos nuestro nuevo listener
                nuevoBoton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Limpiando filtros...'); // Para debug
                    limpiarTodosLosFiltros();
                });
            }
            
            // Verificación inicial
            setTimeout(() => {
                if (hayFiltrosActivos()) {
                    actualizarUIPorFiltros();
                }
            }, 500);
            
            console.log('✅ Modo Búsqueda Inmersivo activado (versión corregida)');
            
        }, 500);
    });
})();
</script>
