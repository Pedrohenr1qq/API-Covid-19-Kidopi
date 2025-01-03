window.onload = () => {

  const urlParams = new URLSearchParams(window.location.search);

  const countryIndex = urlParams.get('countryIndex');
  
  
  const header = document.getElementsByTagName("header")[0];
  const nav = document.getElementsByTagName("nav")[0];
  const footer = document.getElementsByTagName("footer")[0];

  const state = document.getElementsByClassName("state");


  const countryNames = document.getElementsByClassName("countryNames");

  for(let i = 0; i < countryNames.length; i++){
    if(i != countryIndex) countryNames[i].style.opacity = 0.5;
    else  countryNames[i].style.opacity = 1;
  }
/*
  switch(countryIndex){
    case '0':  
      header.style.backgroundColor = "#009b3a";
      nav.style.backgroundColor = "#fedf00";  
      footer.style.backgroundColor = "#009b3a";
      for(let i = 0; i < state.length; i++){
        state[i].style.border = " #009b3a solid 2px"
      }

      break;
    
    case '1':
      header.style.backgroundColor = "#ff0000";
      nav.style.backgroundColor = "#ffffff";
      footer.style.backgroundColor = "#ff0000";
      for(let i = 0; i < state.length; i++){
        state[i].style.border = " #ff0000 solid 2px"
      }
      break;
  
    case '2':
      header.style.backgroundColor = "#00008c";
      header.style.color = "#ffffff";
      nav.style.backgroundColor = "#ff0000";
      footer.style.backgroundColor = "#00008c";
      for(let i = 0; i < state.length; i++){
        state[i].style.border = " #00008c solid 2px"
      }
      break;
  
    default:
        break;
  }

  */

  const stateNameBox = document.getElementById('state');
  const states = document.getElementsByClassName('state');
  const statesNames = document.getElementsByClassName('state-name');

  stateNameBox.addEventListener("change", (event)=>{
    let stateName = stateNameBox.value.toLowerCase();
      event.preventDefault();

      for(let i = 0; i < states.length; i++){
        let currentStateName = statesNames[i].innerHTML.replace("Pronvice/State: ", "").toLowerCase();
        if( currentStateName.includes(stateName) || stateName === ''){
          states[i].style.display = '';
        }else {
          states[i].style.display = "none";
        }
      }
      
      stateName = "";
  });
}