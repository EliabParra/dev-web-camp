(() => {
    const $ = $ => document.querySelector($)

    const tagsInput = $('#tags_input')

    if(tagsInput) {
        const tagsDiv = $('#tags')
        const tagsInputHidden = $('[name="tags"]')
        let tags = []

        // recuperar tags guardados
        if (tagsInputHidden.value !== '') {
            tags = tagsInputHidden.value.split(',')
            mostrarTags()
        }

        // escuchar los cambios en el input
        tagsInput.addEventListener('keypress', guardarTag)

        function guardarTag(e) {
            if (e.keyCode === 44) {
                if (e.target.value.trim() === '' || e.target.value < 1) {
                    return
                }

                e.preventDefault()
                tags = [...tags, e.target.value.trim()]
                tagsInput.value = ''

                mostrarTags()
            }
        }

        function mostrarTags() {
            tagsDiv.textContent = ''

            tags.forEach(tag => {
                const pill = document.createElement('LI')
                pill.classList.add('form__tag')
                pill.textContent = tag
                pill.ondblclick = eliminarTag
                tagsDiv.appendChild(pill)
            })

            actualizarInputHidden()
        }

        function eliminarTag(e) {
            e.target.remove()
            tags = tags.filter(tag => tag !== e.target.textContent)
            actualizarInputHidden()
        }

        function actualizarInputHidden() {
            tagsInputHidden.value = tags.toString()
        }
    }
})();