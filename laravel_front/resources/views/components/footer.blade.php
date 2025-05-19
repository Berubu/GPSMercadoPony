<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<footer class="bg-custom-red text-white p-5 text-center">
    <div class="footer section_padding">
        <div class="sb_footer-links grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="sb_footer-links_div mb-4">
                <h4 class="text-lg font-bold">Contáctanos</h4>
                <a href="{{ url('/trabajar') }}"><p>Trabajar con nosotros</p></a>
                <a href="{{ url('/nosotros') }}"><p>Acerca de nosotros</p></a>
                <a href="{{ url('/corporativo') }}"><p>Información corporativa</p></a>
                <a href="{{ url('/prensa') }}"><p>Departamento de prensa</p></a>
                <a href="{{ url('/science') }}"><p>Pony Science</p></a>
            </div>


            <div class="sb_footer-links_div mb-4">
                <h4 class="text-lg font-bold">Métodos de Pago</h4>
                <a href="{{ url('/debitocredito') }}"><p>Tarjetas de crédito y débito</p></a>
                <a href="{{ url('/tarjetaregalo') }}"><p>Tarjetas de regalo</p></a>
                <a href="{{ url('/efectivo') }}"><p>Pago en efectivo</p></a>
                <a href="{{ url('/MSI') }}"><p>Pago a meses</p></a>
            </div>

            <div class="sb_footer-links_div mb-4">
                <h4 class="text-lg font-bold">Ayuda</h4>
                <a href="{{ url('/devoluciones') }}"><p>Devolución</p></a>
                <a href="{{ url('/dispositivoscontenido') }}"><p>Gestionar dispositivos o contenido</p></a>
                <a href="{{ url('/listaderegalos') }}"><p>Listas de regalos</p></a>
                <a href="{{ url('/ayuda') }}"><p>Ayuda</p></a>
            </div>
        </div>

        <div class="sb_footer-below mt-4">
            <div class="sb_footer-copyright">
                <p>&copy; {{ date('Y') }}</p>
            </div>
            <div class="sb_footer-below-links mt-2">
                MercadoPony. All rights reserved.
                <a href="{{ url('/terms') }}"><p>Condiciones de Uso | Aviso de Privacidad</p></a>
                <a href="{{ url('/more') }}"><p>© {{ date('Y') }}, MercadoPony.com, Inc. o sus afiliados</p></a>
            </div>
        </div>
    </div>
</footer>
