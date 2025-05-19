//Productos vista
import React from 'react';
import { Link } from 'react-router-dom';

const ProductoCard = ({ id, nombre, precio, descripcion, imagen }) => {
    console.log('ID recibido en ProductoCard:', id);

    return (
        <Link
        
            to={`/productos/${id}`}
            className="w-64 h-200 bg-white rounded-x1 overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl m-50 cursor-pointer"
        >
            <div className="flex flex-col h-full">
                {/* Imagen del producto (ajustada para cubrir el fondo blanco) */}

                <div className="h-60 ">
                    <img
                        src={imagen}
                        alt={nombre}
                        className="w-full h-full object-cover"

                    />

                </div>

                {/* Información del producto */}
                <div className="p-4 bg-indigo-950 text-white flex flex-col flex-grow">

                    <h3 className="text-lg font-semibold mb-2 text-center">{nombre}</h3>

                    <p className="text-sm text-green-400 mb-2 font-medium text-center">${precio}</p>

                    <p className="text-sm line-clamp-2 text-center">{descripcion}</p>




                    
                </div>
            </div>
        </Link>
    );
};

export default ProductoCard;
