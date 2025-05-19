<link rel="stylesheet" href="{{ asset('perfil.css') }}">
<div class="App">

    <div class="profile">
        <div class="titulo">
            <h1>Bienvenido, {{ auth()->user()->nombreCompleto }}</h1>
        </div>

        <div class="uppper">
            <div class="content">
                <img
                    src="{{ asset('img/user' . auth()->user()->idUsuario . '.jpg') }}"
                    alt="Imagen de perfil"
                    class="profileImage"
                />
            </div>

            <div class="uppper-buttons">
                {{-- Cambiar foto (sin funcionalidad) --}}
                <button class="buttonCF">
                    <label for="upload">Cambiar Foto</label>
                </button>
                {{-- Eliminar foto (sin funcionalidad) --}}
                <button class="buttonDel">Eliminar Foto</button>
            </div>
        </div>


<button class="buttonProducts" onclick="window.location.href='/lista-productos';">Ver Productos</button>
               <button class="buttonFacturas">Ver Facturas</button>
                <button class="buttonCompras">Compras Realizadas</button>
                <button class="buttonEliminar">Eliminar Cuenta</button>
    </div>


</div>

