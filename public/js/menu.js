const selectors = document.querySelectorAll(".selector");

selectors.forEach((selector) => {
  const knob = selector.querySelector(".knob");
  const ul = selector.querySelector("ul");
  const radios = selector.querySelectorAll('input[type="radio"]');

  let currentAngle = 0;
  let currentIndex = 0;

  // Abre / cierra el menú al tocar la perilla
  knob.addEventListener("click", () => {
    selector.classList.toggle("active");
  });

  radios.forEach((radio, index) => {
    radio.addEventListener("change", () => {
      const count = radios.length;

      // Camino más corto para girar (evita vueltas completas)
      let diff = index - currentIndex;
      if (diff > count / 2) diff -= count;
      else if (diff < -count / 2) diff += count;

      currentAngle -= diff * (360 / count);
      currentIndex = index;
      ul.style.setProperty("--angle", `${currentAngle}deg`);

      // Después de la animación (0.6 s) vamos a la página elegida,
      // salvo que ya estemos en ella
      const destino = radio.dataset.url;
      const mismaPagina =
        new URL(destino, window.location.href).pathname === window.location.pathname;

      if (destino && !mismaPagina) {
        setTimeout(() => {
          window.location.href = destino;
        }, 600);
      }
    });
  });
});