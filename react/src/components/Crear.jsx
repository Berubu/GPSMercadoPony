import React, { useState } from 'react';
import axios from 'axios';

export default function SignupForm() {
  const [formData, setFormData] = useState({
    NombreUsuario: '',
    nombreCompleto: '',
    email: '',
    password: '',
    termsAccepted: false,
  });

  const [statusMessage, setStatusMessage] = useState('');

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!formData.termsAccepted) {
      setStatusMessage('Debes aceptar los términos y condiciones.');
      return;
    }
    try {
      const { status } = await axios.post('http://127.0.0.1:8000/api/usuarios', {
        NombreUsuario: formData.NombreUsuario,
        nombreCompleto: formData.nombreCompleto,
        email: formData.email,
        password: formData.password,
      });
      if (status === 201) {
        setStatusMessage('¡Cuenta creada exitosamente!');
        setFormData({ NombreUsuario: '', nombreCompleto: '', email: '', password: '', termsAccepted: false });
      } else {
        setStatusMessage('Ocurrió un problema al crear la cuenta.');
      }
    } catch (err) {
      console.error('Error al crear la cuenta:', err.response?.data || err.message);
      setStatusMessage('No se pudo crear la cuenta. Verifica los datos ingresados.');
    }
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-custom-gray p-6">
      <form
        onSubmit={handleSubmit}
        className="bg-custom-blue p-8 rounded-2xl shadow-xl w-[30rem] text-white"
      >
        <h2 className="text-xl font-bold mb-6 text-center">
          Ingresa tus datos para crear tu cuenta
        </h2>
        <div className="space-y-4">
          <div>
            <label className="block mb-2">Usuario</label>
            <input
              type="text"
              name="NombreUsuario"
              value={formData.NombreUsuario}
              onChange={handleChange}
              placeholder="Usuario"
              className="w-full px-3 py-2 rounded-md text-black"
            />
          </div>
          <div>
            <label className="block mb-2">Nombre Completo</label>
            <input
              type="text"
              name="nombreCompleto"
              value={formData.nombreCompleto}
              onChange={handleChange}
              placeholder="Nombre Completo"
              className="w-full px-3 py-2 rounded-md text-black"
            />
          </div>
          <div>
            <label className="block mb-2">Correo Electrónico</label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              placeholder="Correo Electrónico"
              className="w-full px-3 py-2 rounded-md text-black"
            />
          </div>
          <div>
            <label className="block mb-2">Contraseña</label>
            <input
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              placeholder="Contraseña"
              className="w-full px-3 py-2 rounded-md text-black"
            />
          </div>
        </div>
        <div className="flex items-center justify-between mt-6 mb-4">
          <div className="flex items-center">
            <input
              type="checkbox"
              name="termsAccepted"
              checked={formData.termsAccepted}
              onChange={handleChange}
              className="mr-2"
            />
            <label className="text-sm">Acepto los términos y condiciones</label>
          </div>
          <button
            type="submit"
            className="bg-custom-red hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-md transition-colors"
          >
            Crear Cuenta
          </button>
        </div>
        {statusMessage && (
          <p className="text-center text-yellow-400 mt-2 text-sm">
            {statusMessage}
          </p>
        )}
      </form>
    </div>
  );
}
