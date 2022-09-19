// With this function the amount of reservations will be counted
function countReservation(){
    const reservering = document.querySelectorAll(".reservering");
    let aantalReserveringen = 0;

    for (let i = 0; i < reservering.length; i++) {
        aantalReserveringen++;
    }

    document.getElementById("infoReservation").innerHTML = "Je hebt vandaag " + aantalReserveringen + " reserveringen";
}