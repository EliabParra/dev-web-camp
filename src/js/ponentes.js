(() => {
    const $ = $ => document.querySelector($)
    const $$ = $$ => document.querySelectorAll($$)

    const ponentesInput = $('#ponentes')
    
    if (ponentesInput) {
        let ponentes = []
        let ponentesFiltrados = []
        const listadoPonentes = $('#listado-ponentes')
        const ponenteInputHidden = $('[name="ponente_id"]')
        
        obtenerPonentes()
        ponentesInput.addEventListener('input', buscarPonentes)

        if (ponenteInputHidden.value) {
            (async () => {
                const ponente = await obtenerPonente(ponenteInputHidden.value)
                ponentesInput.value = `${ponente.nombre.trim()} ${ponente.apellido.trim()}`
            })();
        }

        async function obtenerPonente(id) {
            const url = `/api/ponente?id=${id}`
            const response = await fetch(url)
            const resultado = await response.json()
            return resultado
        }

        function buscarPonentes(e) {
            const busqueda = e.target.value

            if (busqueda.length > 1) {
                const expresion = new RegExp(busqueda.normalize("NFD").replace(/\u0301/g, ""), 'i')
                ponentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().normalize("NFD").replace(/\u0301/g, "").search(expresion) !== -1) {
                        return ponente
                    }
                })

                mostrarPonentes()
            } else {
                while (listadoPonentes.firstChild) listadoPonentes.removeChild(listadoPonentes.firstChild)
                ponenteInputHidden.value = ''
            }
        }

        async function obtenerPonentes() {
            const url = `/api/ponentes`
            const response = await fetch(url)
            resultado = await response.json()

            formatearPonentes(resultado)
        }

        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            })
        }

        function mostrarPonentes() {
            while (listadoPonentes.firstChild) listadoPonentes.removeChild(listadoPonentes.firstChild)

            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('LI')
                    ponenteHTML.classList.add('listado-ponentes__ponente')
                    ponenteHTML.textContent = ponente.nombre
                    ponenteHTML.dataset.ponenteId = ponente.id
                    ponenteHTML.onclick = seleccionarPonente
                    listadoPonentes.appendChild(ponenteHTML)
                })
            } else {
                const noResultados = document.createElement('P')
                noResultados.classList.add('listado-ponentes__no-resultado')
                noResultados.textContent = 'No Hay Resultados'
                listadoPonentes.appendChild(noResultados)
            }
        }

        function seleccionarPonente(e) {
            const ponente = e.target
            const ponenteInput = $('#ponentes')
            ponenteInputHidden.value = ponente.dataset.ponenteId
            ponenteInput.value = ponente.textContent
            while (listadoPonentes.firstChild) listadoPonentes.removeChild(listadoPonentes.firstChild)
        }
    }
})();