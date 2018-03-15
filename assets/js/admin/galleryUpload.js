(() => {
    document.addEventListener('DOMContentLoaded', () => {
        const baseURL =  document.getElementById('baseURL').value
        document.getElementById('btnAddImages').addEventListener('click', (e) => {
            e.preventDefault()
            document.getElementById('imageInput').click()
        })

        document.getElementById('imageInput').addEventListener('change', (e) => {
            console.log('Input files: ', e.srcElement.files)
            const Files = e.srcElement.files

            Array.from(Files).forEach(file => {
                const formData = new FormData()
                formData.append('test', 'tester lige fetch med post')
                formData.append('gallery', file)
    
                fetch(baseURL + 'api/Gallery/Upload', { method: 'POST', body: formData})
                .then( (res) => {
                    return res.json()
                })
                .then( (data) => {
                    console.log('Data fra fetch :: ', data)
                })
                .catch( (err) => {
                    console.warn('Fejl i fetch! -> ', err)
                })
            })
        })

    })
})()