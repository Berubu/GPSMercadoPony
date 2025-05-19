// Front de la factura


import React from 'react';




function FacturaComponent({ factura }) {
  return (




    <div className="bg-white p-6 rounded-md shadow-md mt-6">
      <h2 className="text-2xl mb-4">Factura #{factura.id}</h2>




      <p>Fecha: {factura.fecha}</p>
      <p>Total: ${factura.total}</p>
      <ul>




        {factura.items.map((item, index) => (
          <li key={index}>{item.nombre} - ${item.precio}</li>
        ))}
      </ul>
    </div>
  );
}

export default FacturaComponent;
