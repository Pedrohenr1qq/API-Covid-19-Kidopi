<?php 
  // Configure dotenv
  require_once __DIR__ . '/../vendor/autoload.php';
  use Dotenv\Dotenv;
  $dotenv = Dotenv::createImmutable(__DIR__ . '/../');  $dotenv->load();

  // Require scripts
  require_once '../src/api/getCovidAPI.php';
  require_once '../src/db/connectToDB.php';
  require_once '../src/helpers/helpers.php';
  
  // Configure page
  $countries = ["Brazil", "Canada", "Australia"];
  $countryIndex = 0;

  if(isset($_GET['countryIndex'])){
    $countryIndex = (int) $_GET['countryIndex'];
    if($countryIndex < 0 || $countryIndex > count($countries)){
      $countryIndex = 0;
    }
  }

  // Configure database
  insertNewLog($conn, $countries[$countryIndex]);
  $log = getLastAcess($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COVID-19 API</title>
  <link rel="stylesheet" href="./css/styles.css">
  <script src="./js/script.js"></script>

</head>
<body>
  <div class="container">
    <div id="toolbar" class="toolbar">
      <header>
        <h1><a href="">COVID-19</a></h1>
        <img src="<?php echo "./images/Countries/Flag_of_{$countries[$countryIndex]}.png"?>" alt="<?php echo "Flag of " . $countries[$countryIndex]?>">
      </header> 

      <nav>
        <?php foreach($countries as $key => $country): ?>
          <div class="nav-bar">
            <h2 class="country-names" ><a href= "<?php echo "index.php?countryIndex=" . $key ;?>" ><?php echo $country;?></a></h2> 
          </div>
        <?php endforeach; ?>
      </nav>
    </div>

    <div class="content">
      <div class="title-content">
        <span ><b><?php echo $countries[$countryIndex]?></b></span>
      </div>

      <section class="datas-by-country">
        <div class="cases">
          <h3 >Confirmed cases</h3>    
          <p><?php echo number_format(getTotalConfirmedCases($datasCountry), 0, '.', ',')?></p>
        </div>

        <div class="Deaths">
          <h3 >Deaths</h3>
          <p><?php echo number_format(getTotalDeaths($datasCountry), 0, ".", ",") ?></p>
        </div>

        <div class="Deaths">
          <h3 >Total States</h3>
          <p><?php echo count($datasCountry)?></p>
        </div>

      </section>

      <section class="state-infos">
        <div class="title-states">
          <span><b>Cases and deaths by state</b></span>
          <div class="search-and-states">
            <div class="form-state">
              <input type="text" id="state" placeholder="Search for a Province/State: ">
            </div>
          </div>
        </div>

        <div class="state-subjects">
          <span>Province/State</span>
          <div class="cases-and-deaths">
            <span>Cases</span>
            <span>Deaths</span>
          </div>
        </div>
        
        <div class="state-list">
          <?php foreach ($datasCountry as $datasState): ?>
            <div class="state"> 
              <h2 class="state-name"><?php echo getNameState($datasState)?></h2>

              <div class="cases-and-deaths">
                <p> <?php echo number_format(getConfirmedCases($datasState), 0, ".", ",")?> </p>
                <p><?php echo number_format(getDeaths($datasState), 0, ".", ",")?></p>
              </div>
            </div>
          <?php endforeach;?>          
        </div>
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
          <a target='_blank' rel='noreferrer' href='https://github.com/Pedrohenr1qq'><img src='./images/footer/github_icon.png' alt="github-icon"/></a>
          <a target='_blank' rel='noreferrer' href='https://www.linkedin.com/in/pedro-henrique-pereira-da-silva-8624a8315'><img src='./images/footer/linkedin-icon.png' alt='linkedin icon'/></a>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>