//Landing de productos
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import HeaderComponent from './Header';
import FooterComponent from './Footer';
import ProductoCard from './ProductoCard';

const Landing = () => {
    const [productos, setProductos] = useState([]); // Estado para almacenar los productos
    const [loading, setLoading] = useState(true);   // Estado para indicar si está cargando

    useEffect(() => {
        // Llama a la API para obtener los productos
        axios.get('http://127.0.0.1:8000/api/productos')
            .then(response => {
                console.log('Datos de productos:', response.data);

                console.log('Primer producto:', response.data[0]); // Verifica
                setProductos(response.data); // Almacena los productos en el estado

                setLoading(false);           // Cambia el estado de carga
            })
            .catch(error => {
                console.error('Error al cargar productos:', error);
                setLoading(false);           // Cambia el estado de carga
            });
    }, []);


    if (loading) {
        return <div>Cargando productos...</div>; // Devuelve un mensaje de carga mientras se está cargando
    }

    return (
        <> 

            <HeaderComponent />
            <main className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4 bg-custom-#222222">
                {productos.map((producto, index) => {
                    // Asigna la imagen basándote en el índice del producto

                    const imagen =  `http://localhost:8000/img/${producto.idProducto}.jpg`;


                    console.log(imagen); // Verifica la ruta generada
                    console.log('Producto ID:', producto.idProducto); // Verificar que el ID esté correcto

                    return (
                        <ProductoCard
                            key={producto.idProducto}        // Cambiado a `idProducto`
                            id={producto.idProducto}         // Cambiado a `idProducto`

                            nombre={producto.nombreProducto}
                            precio={producto.precio}
                            descripcion={producto.descripcion}

                            imagen={imagen}                  // Asigna la imagen al componente ProductoCard
                        />
                    );
                })}
                
            </main>
            <FooterComponent />
        </>
    );
}

export default Landing;
