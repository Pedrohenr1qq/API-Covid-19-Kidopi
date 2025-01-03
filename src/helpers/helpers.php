<?php 

  function getTotalConfirmedCases($datasCountry){
    $sum = 0;
    foreach ($datasCountry as $datas){
      $sum += $datas['Confirmados'];
    }

    return $sum;
  }

  function getTotalDeaths($datasCountry){
    $sum = 0;
    foreach ($datasCountry as $datas){
      $sum += $datas['Mortos'];
    }

    return $sum;
  } 

  function getNameState($datasState){
    return $datasState['ProvinciaEstado'];
  }

  function getConfirmedCases($datasState){
    return  $datasState['Confirmados'];
  }

  function getDeaths($datasState){
    return  $datasState['Mortos'];
  }

  function getPercent($a, $b){
    if($b == 0) return 0;
    else return $a/$b * 100;
  }

  function getPercentConfimerdCases($datasState, $datasCountry){
    $confirmedCasesByState = getConfirmedCases($datasState);
    $confirmedCasesByCountry = getTotalConfirmedCases($datasCountry);
    return getPercent($confirmedCasesByState, $confirmedCasesByCountry);
  }

  function getPercentDeaths($datasState){
    $deathsByState = getDeaths($datasState);
    $confirmedCases = getConfirmedCases($datasState);
    return getPercent($deathsByState, $confirmedCases);
  }

  function getTotalPercentDeaths($datasState, $datasCountry){
    $deathsByState = getDeaths($datasState);
    $deathsByCountry = getTotalDeaths($datasCountry);
    return getPercent($deathsByState, $deathsByCountry);
  }

?>