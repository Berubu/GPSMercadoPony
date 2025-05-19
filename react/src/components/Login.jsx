import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function Login() {
  const [formData, setFormData] = useState({
    email: '', 
    password: '',
  });
  const [errorMessage, setErrorMessage] = useState('');
  const [loading, setLoading] = useState(false); // Estado para carga
  const [showPassword, setShowPassword] = useState(false); // Estado para mostrar/ocultar la contraseña
  const navigate = useNavigate(); // Para redirigir

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true); // Iniciar estado de carga
    try {
      const response = await axios.post('http://localhost:8000/api/login', formData);

      if (response.data.success) {
        localStorage.setItem('user', JSON.stringify(response.data.user));
        navigate('/PerfilUsuario'); // Redirigir a perfil
      } else {
        setErrorMessage('Usuario o contraseña incorrectos');
      }
    } catch (error) {
      console.error(error);
      if (error.response) {
        setErrorMessage(error.response.data.message || 'Hubo un error en la autenticación');
      } else {
        setErrorMessage('Error de red o el servidor no responde');
      }
    } finally {
      setLoading(false); // Finalizar estado de carga
    }
  };

  const togglePasswordVisibility = () => {
    setShowPassword(!showPassword); // Cambiar el estado para mostrar/ocultar la contraseña
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-custom-gray">
      <form
        onSubmit={handleSubmit}
        className="bg-custom-blue p-8 rounded-lg shadow-md w-[30rem] text-white"
      >
        <h2 className="mb-6 text-center text-lg font-bold">
          Ingresa tu e-mail y contraseña para iniciar sesión
        </h2>
        <label className="block mb-2">Email</label> {/* Cambié 'Usuario' por 'Email' */}
        <input
          type="email" // Cambié el tipo a 'email'
          name="email"
          value={formData.email}  // Usamos 'email' en vez de 'username'
          onChange={handleChange}
          className="w-full mb-4 px-3 py-2 rounded-md text-black"
          placeholder="Email"
        />
        <label className="block mb-2">Contraseña</label>
        <div className="relative">
          <input
            type={showPassword ? 'text' : 'password'}  // Condición para mostrar/ocultar contraseña
            name="password"
            value={formData.password}
            onChange={handleChange}
            className="w-full mb-4 px-3 py-2 rounded-md text-black"
            placeholder="Contraseña"
          />
          <button 
            type="button" 
            onClick={togglePasswordVisibility}
            className="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500"
          >
            {showPassword } {/* Texto de botón que cambia */}
          </button>
        </div>
        {errorMessage && <div className="text-red-500 mb-4">{errorMessage}</div>}
        <div className="flex items-center justify-end mt-8 mb-4">
          <button
            type="submit"
            className="bg-custom-red hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-md"
            disabled={loading} // Deshabilitar mientras carga
            >
            {loading ? 'Cargando...' : 'Login'}
          </button>
        </div>
      </form>
    </div>
  );
}

export default Login;
