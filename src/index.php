<?php 
  $countries = ["Brazil", "Canada", "Australia"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COVID-19 API</title>
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>

</head>
<body>
  <header>
    <h1>Deaths by COVID-19</h1>
  </header> 
  <nav>
    <?php foreach($countries as $key => $country): ?>
      <h2><a href="#"><?php echo $country;?></a></h2> 
    <?php endforeach; ?>
  </nav>

  <div class="container">
    <section class="data-country">
      <h2>Cases and deaths in "Country"</h2>  

      <div class="cases-and-deaths">

        <div class="cases">
          <h3>Confirmed cases</h3>    
          <p>show the total cases in this Country</p>
        </div>

        <div class="Deaths">
          <h3>Deaths</h3>
          <p>Show the total deaths in this Country</p>
        </div>
      
      </div>

    </section>

    <section class="datas-by-state">
      <h2>Cases and deaths in "State"</h2>  
      <div class="cases-and-deaths">
        <button class="btt-state" id="btt-previous">Previous</button>

        <div class="cases">
          <h3>Confirmed cases</h3>
          <p>show the total cases in this state</p>
        </div>

        <div class="deaths">
          <h3>Deaths</h3>
          <p>Show the total deaths in this state</p>    
        </div>

        <button class="btt-state" id="btt-next">Next</button>  
      </div>
    </section>
  </div>

  <footer>
    <div>
      <div class="lastAcess">
        <p>Last acess: <?php echo date("m/d/Y")?></p>
        <p>Country: --</p>
      </div>
    </div>    

    <div class='copyright'>
        <p>Build by Pedro H. P. Silva</p>
    </div>

    <div class='contacts'>
      <h4>Contacts:</h4><br/>
      <a target='_blank' rel='noreferrer' href='https://github.com/Pedrohenr1qq'><img src='images/footer/github_icon.png' alt="github-icon"/></a>
      <a target='_blank' rel='noreferrer' href='https://www.linkedin.com/in/pedro-henrique-pereira-da-silva-8624a8315'><img src='images/footer/linkedin-icon.png' alt='linkedin icon'/></a>
    </div>
  </footer>

</body>
</html>