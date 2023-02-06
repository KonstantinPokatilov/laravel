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

document.querySelectorAll('.close').forEach(el => {
    el.addEventListener('click', e => {
        el.closest('.alert').remove()
    })
})

document.querySelector('.auth-drop-down').addEventListener('click', e => {
    const block = document.querySelector('.dropdown-menu')
    block.toggleAttribute('show-block')
})