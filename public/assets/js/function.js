console.log('function.js - load')
document.querySelectorAll('.delete').forEach(el => {
    el.addEventListener('click', e => {
        const parent = el.closest('[item]')
        const param = parent.getAttribute('param')
        let id = parent.querySelector('.id').getAttribute('id')
        fetch(`/${param}/delete/${id}`)
            .then(response => response.text())
            .then(result => {
                if (result == 'true') {
                    parent.remove()
                }
            })
    })

})