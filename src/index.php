<?php 
  require __DIR__ . '/vendor/autoload.php';

  use Dotenv\Dotenv;
  
  $dotenv = Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  $countries = ["Brazil", "Canada", "Australia"];
  $countryIndex = 0;

  if(isset($_GET['countryIndex'])){
    $countryIndex = (int) $_GET['countryIndex'];
    if($countryIndex < 0 || $countryIndex > count($countries)){
      $countryIndex = 0;
    }
  }
  require_once 'getCovidAPI.php';

  $datasCountry = getDatasFromCountry($countries[$countryIndex]);

  require_once 'connectToDB.php';

  insertNewLog($conn, $countries[$countryIndex]);

  $log = getLastAcess($conn);


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


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COVID-19 API</title>
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <header>
    <h1><a href="">COVID-19</a></h1>
  </header> 
  <nav>
    <?php foreach($countries as $key => $country): ?>
      <div class="nav-bar">
        <h2><a href= "<?php echo "index.php?countryIndex=" . $key ;?>" ><?php echo $country;?></a></h2> 
        <img src="<?php echo "images/Countries/Flag_of_{$country}.png"?>" alt="<?php echo "Flag of " . $country?>">
      </div>

    <?php endforeach; ?>
  </nav>

  <div class="container">
    <div class="country-and-search">
      <section class="datas-by-country">
        <h2>Cases and deaths in <?php echo $countries[$countryIndex]?></h2>  

        <div class="cases-and-deaths">

          <div class="cases">
            <h3>Confirmed cases</h3>    
            <p><?php echo number_format(getTotalConfirmedCases($datasCountry), 0, '.', ',')?></p>
          </div>

          <div class="Deaths">
            <h3>Deaths</h3>
            <p><?php echo number_format(getTotalDeaths($datasCountry), 0, ".", ",") ?></p>
          </div>
        
        </div>

      </section>

      <div class="form-state">
        <label for="state">Province/State: </label>
        <input type="text" id="state" placeholder="Search for a Province/State: ">
      </div>

    </div>

    <section class="datas-by-state">
      <?php foreach ($datasCountry as $datasState): ?>
        <div class="state"> 
          <h2 class="state-name"><?php echo getNameState($datasState)?></h2>

          <div class="cases-and-deaths">

            <div class="cases">
              <h3>Confirmed cases</h3>
              <p> <?php echo number_format(getConfirmedCases($datasState), 0, ".", ",")?> </p>
              <p> Percent (total): <?php echo number_format(getPercentConfimerdCases($datasState, $datasCountry), 2, '.',',')?>%</p>
            </div>

            <div class="deaths">
              <h3>Deaths</h3>
              <p><?php echo number_format(getDeaths($datasState), 0, ".", ",")?></p>
              <p> Percent (by state): <?php echo number_format(getPercentDeaths($datasState), 2, '.',',')?>%</p>
              <p> Percent (total): <?php echo number_format(getTotalPercentDeaths($datasState, $datasCountry), 2, '.',',')?>%</p>
            </div>
          </div>
        </div>
      <?php endforeach;?>
    </section>
  </div>

  <footer>
    <div>
      <div class="lastAcess">
        <p>Last acess: <?php echo date_format(date_create($log['logAcess']), 'Y/M/d H:i:s');?></p>
        <p>Country: <?php echo $log['country']?></p>
      </div>
    </div>    

    <div class='copyright'>
        <p>Build by Pedro H. P. Silva</p>
    </div>

    <div class='contacts'>
      <h4>Contacts:</h4><br/>
      <div class="contatcs-imgs">
        <a target='_blank' rel='noreferrer' href='https://github.com/Pedrohenr1qq'><img src='images/footer/github_icon.png' alt="github-icon"/></a>
        <a target='_blank' rel='noreferrer' href='https://www.linkedin.com/in/pedro-henrique-pereira-da-silva-8624a8315'><img src='images/footer/linkedin-icon.png' alt='linkedin icon'/></a>
      </div>
    </div>
  </footer>

</body>
</html>