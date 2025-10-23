const modulos = [
  { nombre: "INTRODUCCIÓN A LA PROGRAMACIÓN", progreso: 40 },
  { nombre: "HTML", progreso: 30 },
  { nombre: "CSS", progreso: 80 },
  { nombre: "JAVASCRIPT", progreso: 10 },
  { nombre: "SQL", progreso: 0 },
  { nombre: "PHP", progreso: 100 }
];

window.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".progress-container, .progress-container-mobile");

  cards.forEach((card) => {
    const barra = card.querySelector(".progress-fill");
    const texto = card.querySelector(".progress-text");
    const percent = card.querySelector(".progress-percent");

    if (!barra || !texto || !percent) return;

    const modulo = modulos.find(m => m.nombre === texto.textContent.trim());

    if (modulo) {
      percent.textContent = modulo.progreso + "%";

      setTimeout(() => {
        barra.style.width = modulo.progreso + "%";
        
        // Verificar superposición después de aplicar el width
        setTimeout(checkTextColor, 100);
      }, 300);

      const checkTextColor = () => {
        const barraRect = barra.getBoundingClientRect();
        const textoRect = texto.getBoundingClientRect();
        const percentRect = percent.getBoundingClientRect();

        // Verificar si la barra azul cubre el texto
        const textoOverlap = barraRect.right >= textoRect.left + (textoRect.width / 2);
        const percentOverlap = barraRect.right >= percentRect.left + (percentRect.width / 2);

        texto.style.color = textoOverlap ? "#fff" : "#000";
        percent.style.color = percentOverlap ? "#fff" : "#000";
      };

      // Verificar periódicamente
      const checkOverlap = () => {
        checkTextColor();
        requestAnimationFrame(checkOverlap);
      };
      
      setTimeout(() => {
        requestAnimationFrame(checkOverlap);
      }, 500);
    }
  });
});



// Funcionalidad del menú hamburguesa
const hamburgerBtn = document.getElementById('hamburgerBtn');
const sidebar = document.querySelector('.sidebar');
const overlay = document.getElementById('sidebarOverlay');

hamburgerBtn.addEventListener('click', () => {
  sidebar.classList.toggle('active');
  overlay.classList.toggle('active');
});

// Cerrar al hacer clic fuera
overlay.addEventListener('click', () => {
  sidebar.classList.remove('active');
  overlay.classList.remove('active');
});

const profilePicMobile = document.getElementById("profile-pic-mobile");
const userMenuMobile = document.getElementById("user-menu-mobile");

profilePicMobile.addEventListener("click", () => {
  userMenuMobile.classList.toggle("show");
});

// cerrar al hacer clic afuera
document.addEventListener("click", (e) => {
  if (!profilePicMobile.contains(e.target) && !userMenuMobile.contains(e.target)) {
    userMenuMobile.classList.remove("show");
  }
});



//  Menu usuario
const profilePic = document.getElementById('profile-pic');
const userMenu = document.getElementById('user-menu');

/* --- Funciones para el modal --- */
function toggleMenu() {
  const isOpen = userMenu.classList.toggle('show');
  profilePic.setAttribute('aria-expanded', isOpen);

  // Si se abre, enfoca el primer botón del modal
  if (isOpen) {
    const firstItem = userMenu.querySelector('.menu-item');
    if (firstItem) firstItem.focus();
  }
}

// Abrir/cerrar modal con clic
profilePic.addEventListener('click', toggleMenu);

// Abrir/cerrar modal con teclado (Enter o Space)
profilePic.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' || e.key === ' ') {
    e.preventDefault();
    toggleMenu();
  }
});

// Cerrar modal al hacer clic fuera
document.addEventListener('click', (e) => {
  if (!profilePic.contains(e.target) && !userMenu.contains(e.target)) {
    userMenu.classList.remove('show');
    profilePic.setAttribute('aria-expanded', false);
  }
});

// Cerrar modal con Escape
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && userMenu.classList.contains('show')) {
    userMenu.classList.remove('show');
    profilePic.setAttribute('aria-expanded', false);
    profilePic.focus();
  }
});

// Enter/Space en botones del modal
userMenu.addEventListener('keydown', (e) => {
  const tag = e.target.tagName.toLowerCase();
  if ((e.key === 'Enter' || e.key === ' ') && tag === 'button') {
    e.preventDefault();
    e.target.click();
  }
});

/* --- Función global para toda la página --- */
document.addEventListener('keydown', (e) => {
  const el = document.activeElement;
  if (!el) return;

  const tag = el.tagName.toLowerCase();
  // Solo para elementos enfocados que no sean input/textarea/select
  if ((e.key === 'Enter' || e.key === ' ') && tag !== 'input' && tag !== 'textarea' && tag !== 'select') {
    e.preventDefault();
    el.click();
  }
});

document.addEventListener('mousedown', (e) => {
  if (e.target.matches('.menu-item, #profile-pic, button, a')) {
    e.target.blur(); // quita el foco al hacer clic
  }
});


// Función para centrar el botón activo
function centrarBotonActivo() {
    const botonActivo = document.querySelector('.top-button.active');
    if (botonActivo) {
        botonActivo.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest',
            inline: 'center'
        });
    }
}

// Event listeners para los botones
document.querySelectorAll('.top-button').forEach(boton => {
    boton.addEventListener('click', function() {
        // Remover clase active de todos los botones
        document.querySelectorAll('.top-button').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Agregar clase active al botón clickeado
        this.classList.add('active');
        
        // Centrar el botón
        setTimeout(centrarBotonActivo, 50);
    });
});

// Centrar el botón activo cuando la página carga
window.addEventListener('load', centrarBotonActivo);

// También centrar cuando la ventana cambie de tamaño
window.addEventListener('resize', centrarBotonActivo);


