function onResponse(response){
  return response.json();
}

function onJsonREMOVE(json){
  if(json.esito==true){
    const result = document.querySelector("#preferitiList");
    result.innerHTML='';
    carica_preferiti();
  }
}

function onJson(json){
  const maindiv = document.querySelector("#preferitiList");
  maindiv.innerHTML='';

  for(let i in json){

    const id = json[i].id;
    const img = json[i].url;
    const desc = json[i].testo;


    const container = document.createElement("section");
    container.setAttribute("class", "Notizia");

    const div_id = document.createElement("div");
    div_id.setAttribute("class", "nascosto");
    div_id.textContent = id;
    const div_img = document.createElement("div");
    div_img.setAttribute("class", "sx");
    const div_desc = document.createElement("div");
    div_desc.setAttribute("class", "dx");

    const image = document.createElement("img");
    image.src = img;

    const descrizione =  document.createElement("p");
    descrizione.textContent=desc;

    const remove_pref = document.createElement("a");
    remove_pref.innerText = "Rimuovi dai preferiti";
    remove_pref.setAttribute("class", "button_rem_pref");
    remove_pref.addEventListener("click", removePreferito);

    div_img.appendChild(image)
    div_desc.appendChild(descrizione);
    div_desc.appendChild(remove_pref);

    container.appendChild(div_img);
    container.appendChild(div_desc);
    container.appendChild(div_id);

    maindiv.appendChild(container);
  }
}

function removePreferito(event){
  const button = event.currentTarget;

  const form = new FormData();
  form.append('id', button.parentNode.parentNode.querySelector('.nascosto').textContent);

  fetch("remove_preferito.php", {method: 'post', body: form}).then(onResponse).then(onJsonREMOVE)
}

function carica_preferiti(){
  fetch("carica_preferiti.php").then(onResponse).then(onJson);
}


carica_preferiti();