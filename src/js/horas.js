(() => {
    const $ = $ => document.querySelector($)
    const $$ = $$ => document.querySelectorAll($$)

    const horas = $('#horas')

    if (horas) {
        const categoria = $('[name="categoria_id"]')
        const dias = $$('[name="dia"]')
        const inputHiddenDia = $('[name="dia_id"]')
        const inputHiddenHora = $('[name="hora_id"]')
        
        categoria.addEventListener('change', terminoBusqueda)
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda))
        
        let busqueda = {
            categoria_id: +categoria.value || '',
            dia: +inputHiddenDia.value || ''
        }

        if (!Object.values(busqueda).includes('')) {
            (async () => {
                await buscarEventos()
                const horaId = inputHiddenHora.value
                const horaSeleccionada = $(`[data-hora-id="${horaId}"]`)
                horaSeleccionada.classList.remove('horas__hora--deshabilitada')
                horaSeleccionada.classList.add('horas__hora--seleccionada')
                horaSeleccionada.onclick = seleccionarHora
            })();
        }

        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value

            inputHiddenHora.value = ''
            inputHiddenDia.value = ''
            const horaPrevia = $('.horas__hora--seleccionada')
            if (horaPrevia) horaPrevia.classList.remove('horas__hora--seleccionada')

            if (Object.values(busqueda).includes('')) return
            buscarEventos()
        }
        
        async function buscarEventos() {
            const { categoria_id, dia } = busqueda
            const url = `/api/eventos-horario?dia_id=${categoria_id}&categoria_id=${dia}`
            
            const resultado = await fetch(url)
            const eventos = await resultado.json()
            obtenerHorasDisponibles(eventos)
        }

        function obtenerHorasDisponibles(eventos) {
            // Comprobar si hay eventos
            const listadoHoras = $$('#horas li')
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'))
            
            const horasTomadas = eventos.map(evento => evento.hora_id)
            const listadoHorasArray = Array.from(listadoHoras)
            const resultado = listadoHorasArray.filter(hora => !horasTomadas.includes(hora.dataset.horaId))
            resultado.forEach(li => li.classList.remove('horas__hora--deshabilitada'))
            const horasDisponibles = $$('#horas li:not(.horas__hora--deshabilitada)')

            horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora))
        }

        function seleccionarHora(e) {
            const horaPrevia = $('.horas__hora--seleccionada')
            if (horaPrevia) horaPrevia.classList.remove('horas__hora--seleccionada')
            e.target.classList.add('horas__hora--seleccionada')
            inputHiddenHora.value = e.target.dataset.horaId
            inputHiddenDia.value = $('[name="dia"]:checked').value
        }
    }
})();