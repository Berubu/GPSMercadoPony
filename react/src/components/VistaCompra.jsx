//Vista de compra con vista al producto


import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';  // <-- Importa useNavigate
import "bootstrap/dist/css/bootstrap.min.css";


import 'bootstrap/dist/js/bootstrap.bundle.min.js';


import '../scss/styles.scss';
import HeaderComponent from './Header';
import FooterComponent from './Footer';

function VistaCompra() {
    const { id } = useParams();
    const navigate = useNavigate();           // <-- Hook para navegar

    const [producto, setProducto] = useState(null);

    const [loading, setLoading] = useState(true);
    const [envio, setEnvio] = useState(50); // Iniciamos con envío a domicilio seleccionado
    
    useEffect(() => {

        fetch(`http://127.0.0.1:8000/api/productos/${id}`)
            .then((response) => response.json())

            .then((data) => {
                setProducto(data);
                setLoading(false);

            })
            .catch((error) => {

                console.error('Error al obtener el producto:', error);
                setLoading(false);

            });
    }, [id]);

    // Función para manejar el cambio de método de envío
    const handleEnvioChange = (e) => {
        if (e.target.id === 'envioDomicilio') {
            setEnvio(50);
        } else {

            setEnvio(0);
        }
    };

    if (loading) {
        return <div>Cargando...</div>;
    }

    if (!producto) {
        return <div>No se encontró el producto</div>;
    }
    

    // Modifica el cálculo del total para que use el estado
    const subtotal = parseFloat(producto.precio) || 0;
    const total = subtotal + envio;

    // Ruta de la imagen
    const imagen = `http://localhost:8000/img/${id}.jpg`;

    // Función para confirmar compra -> Navegar a "/factura"
    const handleConfirmarCompra = () => {
        // Aquí podrías realizar cualquier lógica adicional, por ejemplo POST a tu API
        // para registrar la compra en la base de datos.

        // Luego navegas a la vista de factura
        navigate('/factura');
    };

    return (
        <>
            <HeaderComponent />
            <div className="container-fluid" style={{ backgroundColor: '#222222', minHeight: '35vh' }}>
                <div className="row p-3">
                    <div className="col-md-8 mb-3">
                        <div className="card mb-3">
                            <div className="card-body d-flex flex-row align-items-center">
                                <div style={{ width: '150px', marginRight: '1rem' }}>
                                    <img 
                                        src={imagen} 
                                        className="img-fluid" 
                                        alt="Producto" 
                                        style={{ objectFit: 'cover' }}
                                    />
                                </div>
                                <div>
                                    <h5 className="card-title mb-1">{producto.nombreProducto}</h5>
                                    <h6 className="card-subtitle text-muted">${producto.precio}</h6>
                                </div>
                            </div>
                        </div>

                        {/* Modifica las tarjetas de envío */}
                        <div className="card mb-3">
                            <div className="card-body">
                                <div className="form-check">
                                    <input 
                                        className="form-check-input" 
                                        type="radio" 
                                        name="envio" 
                                        id="envioDomicilio"
                                        defaultChecked
                                        onChange={handleEnvioChange}
                                    />
                                    <label className="form-check-label" htmlFor="envioDomicilio">
                                        Enviar a Domicilio (+$50)
                                    </label>
                                </div>
                                <p className="card-text mb-0">Dirección Genérica</p>
                                <a href="#" className="card-subtitle mb-2 text-secondary" style={{ textDecoration: 'none' }}>
                                    Editar Dirección
                                </a>
                            </div>
                        </div>

                        <div className="card">
                            <div className="card-body">
                                <div className="form-check">
                                    <input 
                                        className="form-check-input" 
                                        type="radio" 
                                        name="envio" 
                                        id="recogerPuntoEntrega"
                                        onChange={handleEnvioChange}
                                    />
                                    <label className="form-check-label" htmlFor="recogerPuntoEntrega">
                                        Recoger en punto de entrega (Gratis)
                                    </label>
                                </div>
                                <p className="card-text mb-0">A acordar con el vendedor</p>
                            </div>
                        </div>
                    </div>

                    <div className="col-md-4">
                        <div className="card h-100">
                            <div className="card-body d-flex flex-column">
                                <h5 className="card-title">Forma de Pago</h5>
                                <div className="list-group mb-3">
                                    <button 
                                        className="list-group-item list-group-item-action"
                                    >
                                        Transferencia SPEI
                                    </button>
                                    <button 
                                        className="list-group-item list-group-item-action"
                                    >
                                        Tarjeta de Crédito/Débito
                                    </button>
                                </div>

                                <h6>Resumen de Compra</h6>
                                <p className="card-text m-0">Producto: ${subtotal.toFixed(2)}</p>
                                <p className="card-text m-0">
                                    Envío: ${envio.toFixed(2)} 
                                    {envio === 0 && <span className="text-success"> (Gratis)</span>}
                                </p>
                                <p className="card-text mb-3">
                                    <strong>Total: ${total.toFixed(2)}</strong>
                                </p>

                                <button 
                                    type="button" 
                                    style={{ backgroundColor: '#53102D', borderColor: '#53102D' }}
                                    className="btn btn-primary btn-lg mt-auto "
                                    onClick={handleConfirmarCompra}  // <-- Aquí la navegación
                                >
                                    Confirmar Compra
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <FooterComponent/>
        </>
    );
}

export default VistaCompra;
