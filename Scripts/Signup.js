function onResponse(response) {
  return response.json();
}

function userJson(json) {
  if(json.esito == true) {
      document.querySelector('.names .username span').textContent = "Nome utente già esistente!";
      document.querySelector('.names .username span').classList.add('error');
  } 
  else 
  {
      document.querySelector('.names .username span').textContent = "";
      document.querySelector('.names .username span').classList.remove('error');
  }
}

function emailJson(json) {
  if(json.esito == true) {
    document.querySelector('.names .email span').textContent = 'E-mail già usata!';
    document.querySelector('.names .email span').classList.add('error');
  } 
  else 
  {
    document.querySelector('.names .email span').textContent = '';
    document.querySelector('.names .email span').classList.remove('error');
  }
}


function checknome(event) {
  const name = event.currentTarget;

  if(name.value.length == 0) {
      name.parentNode.parentNode.querySelector("span").textContent = "Nome non valido!";
      name.parentNode.parentNode.querySelector("span").classList.add("error");
  }
  else 
  {
      name.parentNode.parentNode.querySelector("span").textContent = "";
      name.parentNode.parentNode.querySelector("span").classList.remove("error");
  }
}

function checkcognome(event) {
  const surname = event.currentTarget;

  if(surname.value.length == 0) {
      surname.parentNode.parentNode.querySelector("span").textContent = "Cognome non valido!";
      surname.parentNode.parentNode.querySelector("span").classList.add("error");
  }
  else 
  {
      surname.parentNode.parentNode.querySelector("span").textContent = "";
      surname.parentNode.parentNode.querySelector("span").classList.remove("error");
  }
}

function checkusername(event) {
  const user = event.currentTarget;

  if(!/[a-zA-Z0-9]{1,16}/.test(user.value)) {
      user.parentNode.parentNode.querySelector("span").textContent = "Username non valido!";
      user.parentNode.parentNode.querySelector("span").classList.add("error");
  }
  else 
  {
      const u = encodeURIComponent(user.value);
      fetch("check_username.php?q="+u).then(onResponse).then(userJson);
  }
}

function checkemail(event) {
  const em = event.currentTarget;

  if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(em.value)) {
      em.parentNode.parentNode.querySelector("span").textContent = "Email non valida!";
      em.parentNode.parentNode.querySelector("span").classList.add("error");
  }
  else 
  {
      const e = encodeURIComponent(em.value);
      fetch("check_email.php?q="+e).then(onResponse).then(emailJson);
  }
}

function checkpassword(event) {
  const psw = event.currentTarget;

  if(psw.value.length < 8) {
      psw.parentNode.parentNode.querySelector("span").textContent = "Password troppo corta";
      psw.parentNode.parentNode.querySelector("span").classList.add("error");
  }
  else 
  {
      psw.parentNode.parentNode.querySelector("span").textContent = "";
      psw.parentNode.parentNode.querySelector("span").classList.remove("error");
  }
}

function checkconfpass(event) {
  const conf_psw = event.currentTarget;
  const passw = document.querySelector(".password input");

  if(conf_psw.value === passw.value) {
      conf_psw.parentNode.parentNode.querySelector('span').textContent = '';
      conf_psw.parentNode.parentNode.querySelector('span').classList.remove('error');
  } 
  else 
  {
      conf_psw.parentNode.parentNode.querySelector('span').textContent = 'Le password non coincidono';
      conf_psw.parentNode.parentNode.querySelector('span').classList.add('error');
  }
}

const nome = document.querySelector(".names .name input");
nome.addEventListener("blur", checknome);
const cognome = document.querySelector(".names .surname input");
cognome.addEventListener("blur", checkcognome);
const username = document.querySelector(".names .username input");
username.addEventListener("blur", checkusername);
const email = document.querySelector(".names .email input");
email.addEventListener("blur", checkemail);
const password = document.querySelector(".names .password input");
password.addEventListener("blur", checkpassword);
const conf_pass = document.querySelector(".names .confirm_password input");
conf_pass.addEventListener("blur", checkconfpass);