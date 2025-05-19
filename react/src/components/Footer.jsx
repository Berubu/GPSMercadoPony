import React from 'react';

const FooterComponent = () => {
    return (
        <footer className="bg-custom-red text-white p-5 text-center">
            <div className="footer section_padding">
                <div className="sb_footer-links grid grid-cols-1 sm:grid-cols-3 gap-6 justify-items-center">
                    {/* Contactanos */}
                    <div className="sb_footer-links_div mb-4">
                        <h4 className="text-lg font-bold">Contáctanos</h4>
                        <a href="/trabajar"><p>Trabajar con nosotros</p></a>
                        <a href="/nosotros"><p>Acerca de nosotros</p></a>
                        <a href="/corporativo"><p>Información corporativa</p></a>
                        <a href="/prensa"><p>Departamento de prensa</p></a>
                        <a href="/science"><p>Pony Science</p></a>
                    </div>

                    {/* Método de Pago */}
                    <div className="sb_footer-links_div mb-4">
                        <h4 className="text-lg font-bold">Método de Pago</h4>
                        <a href="/debitocredito"><p>Tarjetas de crédito y débito</p></a>
                        <a href="/tarjetaregalo"><p>Tarjetas de regalo</p></a>
                        <a href="/efectivo"><p>Pago en efectivo</p></a>
                        <a href="/MSI"><p>Pago a meses</p></a>
                    </div>

                    {/* Ayuda */}
                    <div className="sb_footer-links_div mb-4">
                        <h4 className="text-lg font-bold">Ayuda</h4>
                        <a href="/devoluciones"><p>Devolución</p></a>
                        <a href="/dispositivoscontenido"><p>Gestionar dispositivos o contenido</p></a>
                        <a href="/listaderegalos"><p>Listas de regalos</p></a>
                        <a href="/ayuda"><p>Ayuda</p></a>
                    </div>
                </div>

                {/* Sección inferior */}
                <div className="sb_footer-below mt-4">
                    <div className="sb_footer-copyright">
                        <p>&copy; {new Date().getFullYear()}</p>
                    </div>
                    <div className="sb_footer-below-links mt-2">
                        MercadoPony. All rights reserved.
                        <a href="/terms"><p>Condiciones de Uso | Aviso de Privacidad</p></a>
                        <a href="/more"><p>© 2024-2024, MercadoPony.com, Inc. o sus afiliados</p></a>
                    </div>
                </div>
            </div>
        </footer>
    );
};

export default FooterComponent;