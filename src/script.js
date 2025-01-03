window.onload = () => {

  const urlParams = new URLSearchParams(window.location.search);

  const countryIndex = urlParams.get('countryIndex');

  const countryNames = document.getElementsByClassName("country-names");

  for(let i = 0; i < countryNames.length; i++){
    if(i != countryIndex) countryNames[i].style.opacity = 0.5;
    else  countryNames[i].style.opacity = 1;
  }

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