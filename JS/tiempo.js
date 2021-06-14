// <!-- Ajax tiempo -->


let ahora = new Date()
let key = "3c001d87c8d1c5b8735c2d9af953d3bc"

let coords = navigator.geolocation.getCurrentPosition((e) => {
    getTiempo(e.coords)
})

function getTiempo({ latitude, longitude }) {
    console.log(latitude, longitude);
    let url = `http://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${key}`
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json"
    }).done((data) => {
        $("#alertTemperatura").text(`En ${data.name} hace ${parseInt(data.main.temp - 273)} ºC | ${data.weather[0].description}`)

        console.log(data);
    }).fail((err) => {
        console.log(err);
    })

}
console.log(coords);

$("#alertHora").text(ahora.getHours() + " : " + ahora.getMinutes() + " : " + ahora.getSeconds())

$(document).ready(function() {

    setTimeout(() => {
        $("#alertaPublicado").hide()
    }, 5000);
    let tiempoOculto = true;

    $("#cerrarAlert").on('click', function() {
        if (tiempoOculto) {
            $("#alertToggle").animate({
                width: 'toggle'
            });
            $("#cerrarAlert").html("<i class='fas fa-umbrella fa-spin'></i>")
        } else {
            $("#alertToggle").animate({
                width: 'toggle'
            });
            $("#cerrarAlert").html("❌")




        }
        tiempoOculto = !tiempoOculto;


    })
    $("#cerrarAlert").click()
})