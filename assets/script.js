const allGroupe  = document.querySelectorAll('.emploi-container > .item')

allGroupe.forEach((gb) => gb.addEventListener('click', (e)=>{
    if(e){
        let locat = e.currentTarget.firstElementChild.textContent.trim();
        var regex = /^[a-zA-Z0-9 ]*$/;

        if(regex.test(locat))
        {
            window.location.href = `emplois.php?groupe=${locat}`;
        } 
    }
}))




