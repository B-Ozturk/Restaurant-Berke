// With this function the amount of reservations will be counted
function countOrder(){
    const bestelling = document.querySelectorAll(".bestelling");
    let aantalBestellingen = 0;

    for (let a = 0; a < bestelling.length; a++) {
        aantalBestellingen++;
    }

    document.getElementById("infoOrder").innerHTML = "Je hebt vandaag " + aantalBestellingen + " bestellingen";
}

// $().alert('dispose')