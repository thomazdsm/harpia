import $ from 'jquery';
import moment from 'moment';
import { Calendar } from 'fullcalendar';

const csrfToken = $('meta[name="csrf-token"]').attr('content');


        rules: {
            cld_tipo_evento: { required: true },
            cld_data: { required: true },
        },
        messages: {
            cld_nome: { required: 'Campo obrigatório' },
            cld_tipo_evento: { required: 'Campo obrigatório' },
        },


    getEventsData();
});

function getEventsData() {
    $.ajax({
        url: window.PageRoutes.calendarios_index,
        type: "GET",
        success: function (data) {
                    "YYYY-MM-DD HH:mm:ss",
                    "DD/MM/YYYY HH:mm",
                    "DD/MM/YYYY",
                    "YYYY-MM-DD"

                return {
                    id: objeto.cld_id,
                    title: objeto.cld_nome,
                };
            });

            renderCalendar(eventos);
        },
        }
    });
}

function renderCalendar(data) {

    if (calendarInstance) {
        calendarInstance.removeAllEvents();
        calendarInstance.addEventSource(data);
        return;
    }

    calendarInstance = new Calendar(calendarEl, {
            left: 'prev,next today',
            center: 'title',
        },
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },
        events: data,
        eventDidMount: function (info) {
            editWrapper.className = 'closeon';
            editWrapper.style.cssText = 'position: absolute; right: 2px; top: 2px; cursor: pointer; z-index: 99; color: inherit;';
            editWrapper.innerHTML = "<i class='fa fa-edit'></i>";

            editWrapper.addEventListener('click', function (e) {
                e.preventDefault();
                editEvent(info.event.id);
            });

                info.el.querySelector('.fc-content') ||
                info.el.querySelector('.fc-event-title-container') ||
                info.el;

            targetNode.appendChild(editWrapper);
        }
    });

    calendarInstance.render();
}

function saveEvent() {
    const data = {
        cld_id: $('#cld_id').val(),
        cld_data: $('#cld_data').val(),
        cld_nome: $('#cld_nome').val(),
        cld_tipo_evento: $('#cld_tipo_evento').val(),
        cld_observacao: $('#cld_observacao').val(),
        _token: csrfToken,
    };

    $('#btnSalvar').prop('disabled', true);
    showLoading();

    $.ajax({
        type: 'POST',
        url: window.PageRoutes.calendarios_create,
        data: data,
        success: function () {
            hideLoading();
            clearForm();
            getEventsData();
        },
        error: function (err) {
            hideLoading();
            notifyError(err?.responseJSON?.message || 'Erro ao salvar o evento.');
            $('#btnSalvar').prop('disabled', false);
        }
    });
}

function editEvent(id) {
    $.ajax({
        type: "GET",
        success: function (data) {

            $('#cld_id').val(data.cld_id);
            $('#cld_nome').val(data.cld_nome);
            $('#cld_tipo_evento').val(data.cld_tipo_evento);
            $('#cld_observacao').val(data.cld_observacao);
            $('#cld_data').val(data.cld_data);
            $('#btnSalvar').html('Alterar');
        },
        }
    });
}

function removeEvent(id) {
    let data = {
        id: id,
        _token: csrfToken,
    };

    $.ajax({
        type: "POST",
        url: window.PageRoutes.calendarios_delete,
        data: data,
            getEventsData();
            clearForm();
        },
        error: function (err) {
        }
    });
}

function clearForm() {
    $('#btnExcluir').remove();
    $('#cld_id').val('');
    $('#cld_nome').val('');
    $('#cld_tipo_evento').val('').focus(); // Typo corrigido aqui
    $('#cld_observacao').val('');
    $('#cld_data').val('');
    $('#btnSalvar').prop("disabled", false);
    $('#btnSalvar').html('Salvar');
}

    });