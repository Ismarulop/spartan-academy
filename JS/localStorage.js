$(document).ready(function() {
    var datosFormulario = {
        nombreActividad: "",
        plazas: "",
        diaSemana: "",
        horaComienzo: "",
        horaFin: ""
    }


    if (localStorage.getItem("datosFormulario")) {
        datosFormulario = JSON.parse(localStorage.getItem("datosFormulario"))
    }

    $("#nombreActividad").val(datosFormulario.nombreActividad)
    $("#plazas").val(datosFormulario.plazas)
    $("#diaDeLaSemana").val(datosFormulario.diaSemana)
    $("#horaComienzo").val(datosFormulario.horaComienzo)
    $("#horaFin").val(datosFormulario.horaFin)

    $("#nombreActividad").change((e) => { datosFormulario.nombreActividad = e.target.value })
    $("#plazas").change((e) => { datosFormulario.plazas = e.target.value })
    $("#diaDeLaSemana").change((e) => { datosFormulario.diaSemana = e.target.value })
    $("#horaComienzo").change((e) => { datosFormulario.horaComienzo = e.target.value })
    $("#horaFin").change((e) => { datosFormulario.horaFin = e.target.value })

    $("#formInsertarEnHorario").change(function() {
        localStorage.setItem("datosFormulario", JSON.stringify(datosFormulario))
    })
})