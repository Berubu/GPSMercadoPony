import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  test: {
    environment: 'jsdom',  // Configura el entorno de pruebas para simular un navegador
    globals: true,  // Habilita las variables globales (como las que se usan en Jest)
    setupFiles: ['./src/setupTests.js'],  // Archivos adicionales de configuración de pruebas, si es necesario
  }
});
