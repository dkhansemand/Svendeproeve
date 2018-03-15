(() => {
    document.addEventListener('DOMContentLoaded', () => {
        const baseURL =  document.getElementById('baseURL').value
        document.getElementById('btnAddImages').addEventListener('click', (e) => {
            e.preventDefault()
            document.getElementById('imageInput').click()
        })

        document.getElementById('imageInput').addEventListener('change', (e) => {
            console.log('Input files: ', e.srcElement.files)
            document.querySelector('.progress-bar').style.display = 'block'
            const progressBar = document.querySelector('.progress-bar progress')
            const Files = e.srcElement.files
            let filesCount = 0
            let fileCurrent = 0
            progressBar.max = Files.length
            document.querySelector('#filesCount').innerText = Files.length
            Array.from(Files).forEach( (file, idx) => {
                const formData = new FormData() 
                formData.append('test', 'tester lige fetch med post')
                formData.append('gallery', file)
    
                fetch(baseURL + 'api/Gallery/Upload', { method: 'POST', body: formData})
                .then( (res) => {
                    return res.json()
                })
                .then( (data) => {
                    fileCurrent++
                    progressBar.value += fileCurrent
                    document.querySelector('#currentFile').innerText = fileCurrent
                    document.querySelector('.file-area').appendChild(ImageContainer(data.filename, data.ID))
                    console.log('Data fra fetch :: ', data)
                })
                .catch( (err) => {
                    console.warn('Fejl i fetch! -> ', err)
                })
            })
        })

        const ImageContainer = (src, id) => {
            const Container = document.createElement('div')
            Container.className = 'gallery-img'
            Container.setAttribute('data-image-id', id)

            const Image = document.createElement('img')
            Image.src = src

            const HiddenId = document.createElement('input')
            HiddenId.type = 'hidden'
            HiddenId.name = 'images[]'
            HiddenId.value = id

            const RemoveBtn = document.createElement('span')
            RemoveBtn.className = 'btn-remove btn-error'
            RemoveBtn.innerText = 'Fjern'
            RemoveBtn.addEventListener('click', (e) => {
                e.target.parentElement.remove()
            })

            Container.appendChild(Image)
            Container.appendChild(HiddenId)
            Container.appendChild(RemoveBtn)
            return Container
        }

    })
})()