let logDisplayElm = document.querySelector('table');
let myForm = document.forms.myForm

const insertURL = './insert.php'

const selectURL = './select.php'

let lastInsertID = 0

setInterval(getpost,1000)

function getpost() {
    fetch(selectURL+'?id='+lastInsertID).then((res) => res.json())
    .then((json) =>{
    json.forEach(value => {
        // console.log(value)
        let tr=document .createElement('tr')
        let userTd=document .createElement('td')
        let talkTD=document .createElement('td')
        let timeStampTD=document .createElement('td')

        userTd.textContent = value.user
        tr.appendChild(userTd)
        talkTD.textContent = value.tork
        tr.appendChild(talkTD)
        timeStampTD.textContent = value.time_stamp
        tr.appendChild(timeStampTD)
        logDisplayElm.appendChild(tr)
        lastInsertID = value.id
    });
    console.log(lastInsertID);
}) 
}
myForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    let formData = new FormData(myForm)

    console.log(formData)

    fetch(insertURL,{
        method:'post',
        body:formData
    })
    .then(res => res.text())
    .then(res => {myForm.talk.value=''})
    .then((text)=>{console.log(text)})

    myForm.talk.value=''
})