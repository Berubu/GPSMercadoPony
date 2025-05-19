import { useState, useEffect } from 'react';
import { useLocation } from 'react-router-dom';
import axios from 'axios';
import ProductoCard from './ProductoCard'; // Asegúrate de importar el ProductoCard
import HeaderComponent from './Header';
import FooterComponent from './Footer';

const SearchResults = () => {
  const [productos, setProductos] = useState([]);
  const [loading, setLoading] = useState(true);
  const location = useLocation();
  const query = new URLSearchParams(location.search).get('q'); // Obtiene el parámetro "q"

  useEffect(() => {
    if (query) {
      setLoading(true);
      axios
        .get(`http://localhost:8000/api/buscar?q=${encodeURIComponent(query)}`)
        .then((response) => {
          setProductos(response.data.data); // Obtén los productos del paginador
          setLoading(false);
        })
        .catch((error) => {
          console.error('Error al buscar productos:', error);
          setLoading(false);
        });
    }
  }, [query]);

  if (loading) return <p>Cargando resultados...</p>;

  return (
    <div>
      {/* Renderiza el Header */}
      <HeaderComponent />

      <div className="p-4">
        <h1 className="text-xl font-bold mb-4">Resultados de búsqueda para: "{query}"</h1>
        {productos.length > 0 ? (
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {productos.map((producto) => (
              <ProductoCard
                key={producto.idProducto}
                id={producto.idProducto}
                nombre={producto.nombreProducto}
                precio={producto.precio}
                descripcion={producto.descripcion}
                imagen={producto.imagen || `http://localhost:8000/img/${producto.idProducto}.jpg`} // Imagen por defecto si no existe
              />
            ))}
          </div>
        ) : (
          <p>No se encontraron productos.</p>
        )}
      </div>

      {/* Renderiza el Footer */}
      <FooterComponent />
    </div>
  );
};

export default SearchResults;
