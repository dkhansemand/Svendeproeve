(() => {
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('btnAddImages').addEventListener('click', (e) => {
            e.preventDefault()
            document.getElementById('imageInput').click()
        })

        document.getElementById('imageInput').addEventListener('change', (e) => {
            //console.log('Input files: ', e.srcElement.files)
            document.querySelector('#uploadError').style.display = 'none'
            document.querySelector('#uploadError .err-msg').innerText = ''
            document.querySelector('.progress-bar').style.display = 'block'
            document.querySelector('#currentFile').innerText = '0'
            const progressBar = document.querySelector('.progress-bar progress')
            const Files = e.srcElement.files
            let filesCount = 0
            let fileCurrent = 0
            progressBar.max = Files.length
            progressBar.value = 0
            document.querySelector('#filesCount').innerText = Files.length
            const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif']

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
                let foundAllowedType = false
                AllowedTypes.find( (type) => {
                    if(file.type === type)
                    {
                        foundAllowedType = true
                        const filereader = new FileReader()
                        filereader.readAsBinaryString(file)
                        filereader.onloadend = (data) => {
                            fileCurrent++
                            progressBar.value += fileCurrent
                            document.querySelector('#currentFile').innerText = fileCurrent
                            document.querySelector('.file-area').appendChild(ImageContainer(btoa(data.target.result), file.name, file.type))
                        }
                    }
                })

                if(!foundAllowedType)
                {
                    document.querySelector('#uploadError .err-msg').innerText = ''
                    document.querySelector('#uploadError').style.display = 'block'
                    document.querySelector('#uploadError .err-msg').innerText = `Filtypen ${file.type} er ikke tilladt.`
                }
            })
        })
        let lastSelectedImage = null
        const ImageContainer = (src, id, mime) => {
            const Container = document.createElement('div')
            Container.className = 'gallery-img'
            Container.addEventListener('click', (e) => {
                if(lastSelectedImage !== null) { lastSelectedImage.style.border = '' }
                e.target.parentElement.style.border = '4px solid #87ceeb'
                document.querySelector('#albumCover').value = id
                lastSelectedImage = e.target.parentElement
            })

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