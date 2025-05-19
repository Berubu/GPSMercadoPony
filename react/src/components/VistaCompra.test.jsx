import React from 'react';
import { render, screen, waitFor } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import VistaCompra from './VistaCompra';

// Mocks para componentes de encabezado y pie de página
jest.mock('./Header', () => () => <div>Mock Header</div>);
jest.mock('./Footer', () => () => <div>Mock Footer</div>);

describe('VistaCompra Component', () => {
  beforeEach(() => {
    // Mock de fetch para simular respuesta de la API
    global.fetch = jest.fn(() =>
      Promise.resolve({
        json: () => Promise.resolve({ nombre: 'Producto de prueba', precio: 100 }),
      })
    );
  });

  afterEach(() => {
    global.fetch.mockClear();
  });

  test('muestra mensaje de carga mientras se obtienen datos', () => {
    render(<VistaCompra />);
    expect(screen.getByText(/Cargando.../i)).toBeInTheDocument();
  });

  test('muestra el mensaje "No se encontró el producto" si no hay datos', async () => {
    global.fetch = jest.fn(() => Promise.resolve({ json: () => Promise.resolve(null) }));
    render(<VistaCompra />);

    await waitFor(() => expect(screen.getByText(/No se encontró el producto/i)).toBeInTheDocument());
  });

  test('muestra los datos del producto después de cargar', async () => {
    render(<VistaCompra />);

    await waitFor(() => {
      expect(screen.getByText(/Enviar a Domicilio/i)).toBeInTheDocument();
      expect(screen.getByText(/Dirección Generica/i)).toBeInTheDocument();
      expect(screen.getByText(/Forma de Pago/i)).toBeInTheDocument();
      expect(screen.getByText(/Producto: \$100/i)).toBeInTheDocument();
      expect(screen.getByText(/Total: \$150/i)).toBeInTheDocument();
    });
  });
});
