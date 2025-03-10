// Import jQuery primeiro, já que muitos plugins dependem dele
window.$ = window.jQuery = require('jquery');

// Import de bibliotecas
require('bootstrap');
require('admin-lte');
require('moment');
// require('inputmask');
var Inputmask = require('inputmask');

require('jquery-validation');
require('select2');

require('icheck');
require('jstree');
require('jquery-datetimepicker');
require('./Chart.js'); // TODO: verificar caminho
require('./cpfcnpj.min.js'); // TODO: verificar caminho
require('fullcalendar');
require('./harpia.js'); // TODO: verificar caminho

$(document).ready(function() {

    $("select").select2();
    // $(".select2").select2();

    // Inicializa todos os dropdowns bootstrap
    $('.dropdown-toggle').dropdown();

    // Inicializa os dropdowns de ação na tabela
    $(document).on('click', '.btn-group .dropdown-toggle', function() {
        $(this).siblings('.dropdown-menu').toggle();
    });

    //Date picker
    $('.only-date').datetimepicker({
        timepicker:false,
        format:'d/m/Y'
    });

    $('[data-mask]').Inputmask()

    $('.datetime').datetimepicker();
});