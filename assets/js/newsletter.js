( () => {
    document.addEventListener('DOMContentLoaded', () => {
        const baseURL = document.querySelector('#baseURL').value

        document.querySelector('#newsletterForm').addEventListener('submit', (e) => {
            e.preventDefault()
            const formData = new FormData()
            formData.append('email', document.querySelector('#emailSubscribe').value)
            fetch(baseURL+'api/Newsletter', {method: 'POST', body: formData})
            .then( (res) => {
                return res.json()
            })
            .then( (data) => {
                if(data.err)
                {
                    document.querySelector('.message').innerHTML = ''
                    document.querySelector('.message').innerHTML = data.msg
                }
                else
                {
                    document.querySelector('#emailSubscribe').value = ''
                    document.querySelector('.message').innerHTML = ''
                    document.querySelector('.message').innerHTML = data.msg
                }
                console.log('Fetch data', data)
            })
            .catch( (err) => {
                console.warn('Fetch error: ', err)
            })
        })
    })
})()