import React from 'react';

const PerfilUsuario = () => {
  return (
    <div className="flex justify-center items-center bg-custom-gray min-h-screen">
      <div className="bg-custom-white p-12 rounded-lg shadow-md w-full max-w-lg">

        <div className="flex flex-col items-center mb-6">
          <div className="w-24 h-24 bg-custom-blue rounded-full"></div>
          <button className="text-gray-700 text-sm mt-2">Editar foto de perfil</button>
          <button className="text-gray-700 text-sm">Eliminar foto</button>
        </div>


        <div className="flex flex-col gap-4">
          <button className="bg-custom-blue text-white py-3 rounded-lg">Compras realizadas</button>
          <button className="bg-custom-blue text-white py-3 rounded-lg">Mis productos</button>
          <button className="bg-custom-blue text-white py-3 rounded-lg">Mis facturas</button>
        </div>


        <button className="bg-red-700 text-white py-3 rounded-lg mt-6 w-full">
          Eliminar cuenta
        </button>
      </div>
    </div>
  );
};

export default PerfilUsuario;
