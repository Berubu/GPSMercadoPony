// Informacion del header
import { useState } from 'react';


import { Link, useNavigate } from 'react-router-dom'; // Importa useNavigate para redirección




import logo from '../assets/img/Logo B Transparente.png';



const HeaderComponent = () => {
  const [searchQuery, setSearchQuery] = useState('');
  const navigate = useNavigate();


  const handleSearchChange = (e) => {
    setSearchQuery(e.target.value);

  };

  const handleSearchSubmit = (e) => {
    e.preventDefault();

    if (searchQuery.trim() !== '') {
      navigate(`/buscar?q=${encodeURIComponent(searchQuery)}`);
    }

  };

  // Simulación de autenticación: obtén el usuario de localStorage (ajusta según tu lógica real)
  const user = JSON.parse(localStorage.getItem('user'));

  const handleLogout = () => {
    localStorage.removeItem('user');
    navigate('/Login');


  };

  return (
    <header className="flex flex-col sm:flex-row justify-between items-center p-4 text-white bg-custom-red">
      <div className="max-w-xs cursor-pointer mb-4 sm:mb-0">
        <Link to="/">

          <img src={logo} alt="MercadoPony" className="w-24 sm:w-auto" />
          
        </Link>
      </div>
      <form onSubmit={handleSearchSubmit} className="flex items-center w-full sm:w-1/2 relative mb-4 sm:mb-0">
        <input
          type="text"
          placeholder="Buscar..."
          value={searchQuery}
          onChange={handleSearchChange}
          className="bg-custom-blue block w-full border border-slate-300 rounded-md shadow-sm pl-10 pr-12 focus:outline-none focus:border-custom-wine focus:ring-custom-wine focus:ring-1 sm:text-sm"
        />
        <div className="absolute left-3">
          <svg
            className="w-5 h-5 text-gray-400"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="2"
              d="M21 21l-4.35-4.35a7.5 7.5 0 10-1.15 1.15L21 21z"
            ></path>
          </svg>
        </div>
      </form>
      <div className="auth-buttons flex space-x-2">
        {user ? (
          <>
            <Link 
              to="/PerfilUsuario"
              className="bg-custom-blue text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition-colors duration-200"
            >
              {user.nombreCompleto || user.username}
            </Link>
            <button
              onClick={handleLogout}
              className="bg-custom-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
            >
              Logout
            </button>
          </>
        ) : (
          <>
            <Link
              to="/Crear"
              className="bg-custom-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
            >
              Crear Cuenta
            </Link>
            <Link
              to="/Login"
              className="bg-custom-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
            >
              Login
            </Link>
          </>
        )}
      </div>
    </header>
  );
};

export default HeaderComponent;
