//HOES Sender
const myForm = document.getElementById('form_____emp');
const resultContainer = document.getElementById('box_emplois');
const myAlert = document.querySelector('.alert')
var group = document.querySelector('#groupe').value
const loader = document.querySelector('.loader') 
let footer = document.querySelector(".kkb-footer")
const main = document.querySelector('.main')
const subBtn  = document.querySelector('.sub')

const allGroupe = ['DEV103','DEV102','DEV101','ID101','ID102','ID103','CMOSW101','CRJ101','DEVOWFS202','DEVOWFS203',
'IDOSR201' , 'IDOSR202','IDOSR203','INFO101','INFO201','MIR201','MIR301','OPAO101','TCA101','TCI101']


myForm.addEventListener('submit', event => {
      event.preventDefault();
      let currGroupe = document.getElementById('groupe').value;
      var regex = /^[a-zA-Z0-9 ]*$/;

      if(!currGroupe || !regex.test(currGroupe)){
        displayAlert('check you enter ! Valid Format Ex: <DEV103>.','alert-danger')
        return;
      }

      if(!allGroupe.includes(currGroupe)){
        displayAlert('group not found !','alert-danger')
        return;
      }

      fetch('emplois/getEmp.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
          'groupe': currGroupe
        })
      })
      .then(response => response.text())
      .then(data => {
        if(data){
            loader.classList.add('show')
            setTimeout(() => {
              loader.classList.remove('show')
              displayAlert(`Program for groupe: ${currGroupe}`,'alert-success')
              resultContainer.innerHTML = data
            }, 1000);
        }
        else{
            displayAlert('refraicher la page ou verifier votre connexion','alert-danger')
        }

      })
      .catch(error => console.error(error));
    });


function displayAlert(msg,cls){
    myAlert.textContent = msg
    myAlert.classList.add(cls)
    setTimeout(()=>{
        myAlert.classList.remove(cls)
    },3000)
}

const headerNav = document.querySelector('header')

window.addEventListener('scroll',function(){
  headerNav.classList.toggle('fixed__nav',window.scrollY > 55)
})


subBtn.addEventListener('click',(e)=>{
  if(resultContainer.innerHTML){
        document.body.removeChild(footer)
        main.appendChild(footer)
        footer.classList.add('reverse')
  }
})
 
