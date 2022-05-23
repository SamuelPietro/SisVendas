$(document).ready(function () {
    // Charts
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(vendasServico);
    google.charts.setOnLoadCallback(vendasCliente);
    google.charts.setOnLoadCallback(vendasDiarias);
    // Forms
    $("#btnExpandir").click(function () {
        $("#CntDetalhar").show("fast");
        $("#btnRecolher").show("fast");
        $("#btnExpandir").hide("fast");
    });
    $("#btnRecolher").click(function () {
        $("#CntDetalhar").hide("fast");
        $("#btnRecolher").hide("fast");
        $("#btnExpandir").show("fast");
    });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('.cep').mask('00000-000');
    $('.valor').mask("#0,00", { reverse: true });
    // Imprimir





});
