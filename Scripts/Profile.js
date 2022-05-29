// Casella di input
const insert = document.createElement('input');
insert.setAttribute("type", "text");

// Bottone di conferma 
const confirm = document.createElement('input');
confirm.setAttribute("class", "confirm_button")
confirm.setAttribute("type", "submit");
confirm.setAttribute("value", "Conferma");

function onClickNome() 
{
    const formNome = document.querySelector("#name");

    insert.setAttribute("name", "new_name");

     // Aggiungo quello che ho creato al div apposito
    formNome.appendChild(insert);
    formNome.appendChild(confirm);
}

function onClickCognome() 
{
    const formCognome = document.querySelector("#surname");

    insert.setAttribute("name", "new_surname");
    
    // Aggiungo quello che ho creato al div apposito
    formCognome.appendChild(insert);
    formCognome.appendChild(confirm);
}

function onClickUsername() 
{
    const formUsername = document.querySelector("#username");

    insert.setAttribute("name", "new_username");
    
    // Aggiungo quello che ho creato al div apposito
    formUsername.appendChild(insert);
    formUsername.appendChild(confirm);
}

function onClickEmail() 
{
    const formEmail = document.querySelector("#email");

    insert.setAttribute("name", "new_email");
    
    // Aggiungo quello che ho creato al div apposito
    formEmail.appendChild(insert);
    formEmail.appendChild(confirm);
}

function onClickPassword() 
{
    const formPassword = document.querySelector("#password");
    
    insert.setAttribute("name", "new_password");

    // Aggiungo quello che ho creato al div apposito
    formPassword.appendChild(insert);
    formPassword.appendChild(confirm);
}

const button_nome = document.querySelector("#B_name");
button_nome.addEventListener("click", onClickNome);

const button_cognome = document.querySelector("#B_surname");
button_cognome.addEventListener("click", onClickCognome);

const button_username = document.querySelector("#B_username");
button_username.addEventListener("click", onClickUsername);

const button_email = document.querySelector("#B_email");
button_email.addEventListener("click", onClickEmail);

const button_password = document.querySelector("#B_password");
button_password.addEventListener("click", onClickPassword);
