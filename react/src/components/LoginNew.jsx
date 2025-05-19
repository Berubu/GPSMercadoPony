//Login nuevo con los campos correctos
import React from 'react'
import '../LoginNew.css'
const LoginNew = () => {
  return (
    <div className="wrapper">
        <form action="">
            <h1>Login</h1>
            <p className="user">Usuario</p>
            <div className="input-box-user">
                
                <input type="text" placeholder="Usuario"/>
            </div>


            <p className="password">Contraseña</p>

            <div className="input-box-pass">


        
                <input type="password" placeholder="Contraseña"/>

            </div>
            <div className="logbutton">

            <button type="submit">Ingresar</button>
            </div>
            <div className="register-link">
                <p>¿No tienes una cuenta? <a href="#">Regístrate</a></p>
            </div>
        </form>
    </div>
  )
}

export default LoginNew