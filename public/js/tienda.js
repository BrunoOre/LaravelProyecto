const filas = document.querySelectorAll("[data-producto]");
const totalSpan = document.getElementById("total");
const btnComprar = document.getElementById("btn-comprar");

// Suma precio × cantidad de cada producto y actualiza el total
function recalcular() {
  let total = 0;

  filas.forEach((fila) => {
    const precio = parseFloat(fila.dataset.precio);
    const cantidad = parseInt(fila.querySelector("input").value) || 0;
    total += precio * cantidad;
  });

  totalSpan.textContent = total.toFixed(2);
  btnComprar.disabled = total === 0; // sin productos no se puede continuar
}

filas.forEach((fila) => {
  const input = fila.querySelector("input");

  fila.querySelector(".mas").addEventListener("click", () => {
    input.value = Math.min(50, (parseInt(input.value) || 0) + 1);
    recalcular();
  });

  fila.querySelector(".menos").addEventListener("click", () => {
    input.value = Math.max(0, (parseInt(input.value) || 0) - 1);
    recalcular();
  });

  input.addEventListener("input", recalcular);
});

recalcular();