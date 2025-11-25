const numeLuni = [
    "Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie",
    "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"
];
const inputActivitate = document.getElementById("inputActivitate");
const btnAdauga = document.getElementById("btn");
const listaActivitati = document.getElementById("listaActivitati");

function adaugaActivitate() {
    const textActivitate = inputActivitate.value.trim();
    if (textActivitate !== "") {
        const elementNou = document.createElement("li");
        const dataCurenta = new Date();
        const zi = dataCurenta.getDate();
        const luna = numeLuni[dataCurenta.getMonth()]; 
        const an = dataCurenta.getFullYear();
        elementNou.textContent = `${textActivitate}: ${zi} ${luna} ${an}`;
        listaActivitati.appendChild(elementNou);
        inputActivitate.value = "";
    } else {
        alert("Introduceți o activitate!"); 
    }
}
btn.addEventListener("click", adaugaActivitate);
inputActivitate.addEventListener("keypress", function(e) {
    if (e.key === "Enter") {
        adaugaActivitate();
    }
});