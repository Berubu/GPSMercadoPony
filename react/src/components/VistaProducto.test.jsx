import { render, screen, waitFor } from '@testing-library/react';
import VistaProducto from './VistaProducto';
import '@testing-library/jest-dom/extend-expect';

global.fetch = jest.fn(() =>
  Promise.resolve({
    json: () => Promise.resolve({ nombreProducto: 'Producto 1', precio: 100, descripcion: 'Descripción del producto', idUsuario: 1 }),
  })
);
//descripcion sobre los porductos 
describe('VistaProducto', () => {
  test('muestra "Cargando..." mientras los datos se están cargando', () => {
    render(<VistaProducto />);
    expect(screen.getByText('Cargando...')).toBeInTheDocument();
  });

  test('muestra el producto cuando los datos se cargan correctamente', async () => {
    render(<VistaProducto />);
    await waitFor(() => screen.getByText('Producto 1'));
    expect(screen.getByText('Producto 1')).toBeInTheDocument();
    expect(screen.getByText('$100')).toBeInTheDocument();
    expect(screen.getByText('Descripción del producto')).toBeInTheDocument();
  });

  test('muestra un mensaje de error si no se puede cargar el producto', async () => {
    global.fetch.mockImplementationOnce(() => Promise.reject('Error al obtener el producto'));

    render(<VistaProducto />);
    await waitFor(() => screen.getByText('No se encontró el producto'));
    expect(screen.getByText('No se encontró el producto')).toBeInTheDocument();
  });
});
