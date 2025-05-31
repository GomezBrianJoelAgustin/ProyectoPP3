// resources/js/app.js
console.log('APP.JS: Script started!');

import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// --- LÓGICA PARA EL MODO OSCURO ---

// 1. Función para aplicar o quitar la clase 'dark' del elemento <html>
function applyTheme(theme) {
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        console.log('applyTheme: Class "dark" ADDED to HTML.');
    } else {
        document.documentElement.classList.remove('dark');
        console.log('applyTheme: Class "dark" REMOVED from HTML.');
    }
}

// 2. Determina el tema inicial al cargar la página
const getInitialTheme = () => {
    const savedTheme = localStorage.getItem('theme');
    console.log('getInitialTheme: Saved theme from localStorage:', savedTheme);

    if (savedTheme) {
        return savedTheme; // Usa el tema guardado si existe
    } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        console.log('getInitialTheme: System preference is dark.');
        return 'dark'; // Si no hay guardado, usa la preferencia del sistema
    } else {
        console.log('getInitialTheme: No saved theme, defaulting to light.');
        return 'light'; // Si nada más, por defecto es claro
    }
};

// Aplica el tema inicial cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    applyTheme(getInitialTheme());
});


// 3. Función global para alternar el modo oscuro (llamada desde el botón)
window.toggleDarkMode = () => {
    if (document.documentElement.classList.contains('dark')) {
        // Si está en modo oscuro, cambia a claro
        applyTheme('light');
        localStorage.setItem('theme', 'light');
        console.log('toggleDarkMode: Switched to light mode.');
    } else {
        // Si está en modo claro, cambia a oscuro
        applyTheme('dark');
        localStorage.setItem('theme', 'dark');
        console.log('toggleDarkMode: Switched to dark mode.');
    }
};

// 4. Escucha cambios en la preferencia del sistema operativo
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    // Solo actualiza si el usuario no ha seleccionado un tema explícitamente (es decir, no hay nada en localStorage)
    if (localStorage.getItem('theme') === null) {
        applyTheme(e.matches ? 'dark' : 'light');
        console.log('System preference changed, auto-adjusting theme.');
    }
});

// --- FIN LÓGICA PARA EL MODO OSCURO ---