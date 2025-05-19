//Vista de producto

import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';  // <-- IMPORTA useNavigate
import "bootstrap/dist/css/bootstrap.min.css";
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import '../scss/styles.scss';
import HeaderComponent from './Header';
import FooterComponent from './Footer';

function VistaProducto() {
    const { id } = useParams(); 
    const navigate = useNavigate();         // <-- CREA LA INSTANCIA PARA NAVEGAR

    const [producto, setProducto] = useState(null);
    const [loading, setLoading] = useState(true);

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

    if (loading) {
        return <div>Cargando...</div>;
    }

    if (!producto) {
        return <div>No se encontró el producto</div>;
    }

    const imagen = `http://localhost:8000/img/${id}.jpg`;

    return (
        <>
            <HeaderComponent />
            <div className="container-fluid" style={{ backgroundColor: '#222222', minHeight: '60vh' }}>
                <div className="row">
                    <div className="col-md-8   offset-md-19 mt-5 mb-5">
                        <div className="card h-85">
                            <div className="card-body d-flex flex-column">
                                <div className="row">
                                    <div className="col-md-6 mb-3 "> 
                                        <div id="carouselExampleIndicators" className="carousel slide carousel-fade"
                                             data-bs-ride="carousel">
                                            <div className="carousel-inner" style={{ height: '400px' }}>
                                                <div className="carousel-item active">
                                                    <img src={imagen} className="d-block w-100" alt="Imagen del producto"
                                                         style={{ objectFit: 'cover', height: '100%' }} />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-6 ">
                                        <h5 className="card-title">{producto.nombreProducto}</h5>
                                        <h6 className="card-subtitle mb-2 text-body-secondary">${producto.precio}</h6>
                                        <p className="card-text">Descripción:</p>
                                        <p className="card-text">{producto.descripcion}</p>
                                    </div>
                                </div>
                                
                                <div className="d-flex align-items-center mt-auto">
                                    {/* Foto del vendedor */}
                                    <img
                                        src={`http://localhost:8000/img/usuarios/${producto.idUsuario}.jpg`}
                                        alt="Foto del vendedor"
                                        className="rounded-circle me-2"
                                        style={{ width: '48px', height: '48px', objectFit: 'cover', border: '2px solid #53102D' }}
                                        onError={e => { e.target.onerror = null; e.target.src = 'https://via.placeholder.com/48?text=User'; }}
                                    />
                                    <p className="card-text mb-0">Vendedor: Usuario {producto.idUsuario}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4 offset-md-19 mt-5 mb-5">
                        <div className="card h-100">
                            <div className="card-body d-flex flex-column justify-content-between">
                                <h5 className="card-title">Métodos de Pago</h5>
                                <div className="form-check mb-4 mt-1">
                                    <input className="form-check-input" type="radio" name="metodoPago" id="deposito" value="deposito" />
                                    <label className="form-check-label text-muted" htmlFor="deposito">
                                        Depósito
                                    </label>
                                    <input className="form-check-input" type="radio" name="metodoPago" id="transferencia" value="transferencia" />
                                    <label className="form-check-label text-muted" htmlFor="transferencia">
                                        Transferencia
                                    </label>
                                    <input className="form-check-input" type="radio" name="metodoPago" id="paypal" value="paypal" />
                                    <label className="form-check-label text-muted" htmlFor="paypal">
                                        PayPal
                                    </label>
                                    <input className="form-check-input" type="radio" name="metodoPago" id="credito" value="credito" />
                                    <label className="form-check-label text-muted" htmlFor="credito">
                                        Tarjeta de crédito
                                    </label>
                                    <input className="form-check-input" type="radio" name="metodoPago" id="debito" value="debito" />
                                    <label className="form-check-label text-muted" htmlFor="debito">
                                        Tarjeta de débito
                                    </label>
                                </div>
                                <button 
                                    type="button" 
                                    className="btn btn-primary btn-lg mb-3 mt-auto"
                                    style={{ backgroundColor: '#53102D', borderColor: '#53102D' }}
                                    onClick={() => navigate(`/compra/${id}`)}  // <-- AQUÍ LA NAVEGACIÓN
                                >
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <FooterComponent />
        </>
    );
}

export default VistaProducto;
