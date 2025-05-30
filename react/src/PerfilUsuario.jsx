// PerfilUsuario.jsx
import React, { useState, useEffect } from 'react';
import './PerfilUsuario.css';
import defaultProfileImage from './assets/img/profileEmpty.jpg';
import HeaderComponent from './components/Header';
import FooterComponent from './components/Footer';

function PerfilUsuario() {
  const [profileImage, setProfileImage] = useState(defaultProfileImage);
  const [user, setUser] = useState(null);

  useEffect(() => {
    const storedUser = JSON.parse(localStorage.getItem('user'));
    if (storedUser) setUser(storedUser);

    const storedImage = localStorage.getItem('profileImage');
    if (storedImage) setProfileImage(storedImage);
  }, []);

  const handleChangeImage = (e) => {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onloadend = () => {
      setProfileImage(reader.result);
      localStorage.setItem('profileImage', reader.result);
    };
    reader.readAsDataURL(file);
  };

  const handleRemoveImage = () => {
    setProfileImage(defaultProfileImage);
    localStorage.removeItem('profileImage');
  };

  if (!user) return <div className="loading">Cargando perfil...</div>;

  return (
    <>
      <HeaderComponent />
      <main className="perfil-container">
        <h1 className="perfil-title">Hola, <span className="perfil-username">{user.nombreCompleto || user.username}</span></h1>
        <section className="profile-card">
          <div className="image-wrapper" style={{ display: 'flex', flexDirection: 'column', alignItems: 'center' }}>
            <img className="profile-image" src={profileImage} alt="Perfil" />
            <div className="image-buttons">
              <label htmlFor="upload" className="btn btn-change">
                Cambiar Foto
                <input
                  id="upload"
                  type="file"
                  onChange={handleChangeImage}
                  accept="image/*"
                  hidden
                />
              </label>
              <button className="btn btn-remove" onClick={handleRemoveImage}>
                Eliminar Foto
              </button>
            </div>
          </div>
          <ul className="actions-list">
            <li><button onClick={() => window.location.href = 'http://127.0.0.1:8000/compras'} className="btn action-btn">Compras Realizadas</button></li>
            <li><button className="btn btn-danger">Eliminar Cuenta</button></li>
          </ul>
        </section>
      </main>
      <FooterComponent />
    </>
  );
}

export default PerfilUsuario;
