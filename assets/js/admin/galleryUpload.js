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
                /* const formData = new FormData() 
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
                    document.querySelector('.file-area').appendChild(ImageContainer(data.base, data.filename, data.mime))
                    console.log('Data fra fetch :: ', data)
                })
                .catch( (err) => {
                    console.warn('Fejl i fetch! -> ', err)
                }) */
                const filereader = new FileReader()
                filereader.readAsBinaryString(file)
                filereader.onloadend = (data) => {
                    //console.log('fileReader: ', btoa(data.target.result))
                    fileCurrent++
                    progressBar.value += fileCurrent
                    document.querySelector('#currentFile').innerText = fileCurrent
                    document.querySelector('.file-area').appendChild(ImageContainer(btoa(data.target.result), file.name, file.type))
                }
            })
        })

        const ImageContainer = (src, id, mime) => {
            const Container = document.createElement('div')
            Container.className = 'gallery-img'

            const Image = document.createElement('img')
            Image.src = 'data:'+mime+';base64,'+src

            const HiddenId = document.createElement('input')
            HiddenId.type = 'hidden'
            HiddenId.name = 'images[]'
            HiddenId.value = id

            const RemoveBtn = document.createElement('span')
            RemoveBtn.className = 'btn-remove btn-error'
            RemoveBtn.innerText = 'X'
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