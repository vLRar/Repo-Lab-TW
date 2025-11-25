const numeLuni = [
    "Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie",
    "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"
];
const detaliiDiv = document.getElementById("detalii");
const btnDetalii = document.getElementById("btnDetalii");
const dataProdusSpan = document.getElementById("dataProdus");


document.addEventListener("DOMContentLoaded", () => {
    detaliiDiv.classList.add("ascuns");
    const dataCurenta = new Date();
    const zi = dataCurenta.getDate();
    const luna = numeLuni[dataCurenta.getMonth()]; 
    const an = dataCurenta.getFullYear();
    dataProdusSpan.textContent = `${zi} ${luna} ${an}`;
});
btnDetalii.addEventListener("click", () => {
    detaliiDiv.classList.toggle("ascuns");
    const suntVizibile = !detaliiDiv.classList.contains("ascuns");
    if (suntVizibile) {
        btnDetalii.textContent = "Ascunde detalii";
        btnDetalii.style.backgroundColor = "#dc3545";
    } else {
        btnDetalii.textContent = "Afișează detalii";
        btnDetalii.style.backgroundColor = "#28a745";
    }
});