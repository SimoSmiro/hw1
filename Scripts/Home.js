function onResponse(response){
  return response.json();
}

function onResponseChamp(response){
  console.log('tornato il json per vincitore');
  return response.json();
}

function onJsonADD(json){
  console.log(json);
}

function onJson(json){
  const section = document.querySelector("#contents");
  section.innerHTML='';

  for(let i in json){

    const id = json[i].id;
    const img = json[i].img_url;
    const desc = json[i].descrizione;


    const container = document.createElement("section");
    container.setAttribute("class", "Notizia");

    const div_id = document.createElement("div");
    div_id.setAttribute("class", "nascosto");
    const p_id = document.createElement("p");
    p_id.setAttribute("class","id");
    p_id.textContent = id;

    const div_img = document.createElement("div");
    div_img.setAttribute("class", "sx");
    const div_desc = document.createElement("div");
    div_desc.setAttribute("class", "dx");

    const image = document.createElement("img");
    image.src = img;

    const descrizione =  document.createElement("p");
    descrizione.textContent=desc;

    const add_pref = document.createElement("a");
    add_pref.innerText = "Aggiungi ai preferiti";
    add_pref.setAttribute("class", "button_pref");
    add_pref.addEventListener("click", addPreferito);

    div_img.appendChild(image)
    div_desc.appendChild(descrizione);
    div_desc.appendChild(add_pref);
    div_id.appendChild(p_id);

    container.appendChild(div_img);
    container.appendChild(div_desc);
    container.appendChild(div_id);

    section.appendChild(container);
  }
}

function onJsonChamp(json){
  const container1 = document.querySelector('#driver');
  const container2 = document.querySelector('#points');
  container1.innerHTML='';
  container2.innerHTML='';

  console.log('cercopilota')
  const pilota = json.MRData.StandingsTable.StandingsLists[0].DriverStandings[0].Driver.driverId;
  const punti = json.MRData.StandingsTable.StandingsLists[0].DriverStandings[0].points;

  const winner=document.createElement('p');
  winner.textContent=pilota;
  const maxPoints=document.createElement('p');
  maxPoints.textContent=punti;

  document.querySelector('#driver').appendChild(winner);
  document.querySelector('#points').appendChild(maxPoints);
}

function addPreferito(event){
  const button = event.currentTarget;

  const form = new FormData();
  form.append('id', button.parentNode.parentNode.querySelector('.nascosto .id').textContent);
  form.append('immagine', button.parentNode.parentNode.querySelector('img').src);
  form.append('testo', button.parentNode.querySelector('p').textContent);

  for(let value of form.values()){
    console.log(value);
  }

  fetch("add_preferito.php", {method: 'post', body: form}).then(onResponse).then(onJsonADD);
}

function carica_contents(){
  fetch("carica_contents.php").then(onResponse).then(onJson);
}

function RicercaCampione(event){
  event.preventDefault();

  const anno=document.querySelector("#ChampSearch");
  const year=encodeURIComponent(anno.value);

  if(year>1950 && year<=2021 || year=='current'){
    
    console.log('Ricerca:' + year);
    fetch("API_DriverStandings.php?q="+year).then(onResponseChamp).then(onJsonChamp);
  }else{

  }
}

function toggleMenu(menu){
  menu.classList.toggle("open");
}

carica_contents();
const form1 = document.querySelector("#ChampForm");
form1.addEventListener("submit", RicercaCampione);