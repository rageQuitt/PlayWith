<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="..\blog\static\style.css">
    <title>CAROUSEL SLIDER</title>
  </head>
  <body>
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class='carousel-indicators'>
      <!--ajout des puces pour switch slide-->
      <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
      <li data-target='#myCarousel' data-slide-to='1'></li>
      <li data-target='#myCarousel' data-slide-to='2'></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active"><!--Slide 1ere du nom-->
        <div class="overlay-image" style='background-image:url(https://images.pexels.com/photos/6999027/pexels-photo-6999027.jpeg?cs=srgb&dl=pexels-monstera-6999027.jpg&fm=jpg)';>        
        </div>
        <div class="container">
          <h1>Choisissez votre programme sportif</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum blanditiis numquam nam et assumenda quis, voluptatibus neque a ipsa eos natus omnis ullam sint libero velit illo dolore earum obcaecati?</p>
          <a href="#" class="btn btn-lg btn-primary">
            Inscrivez-Vous
          </a>
        </div>
      </div>
      <div class="carousel-item"><!--IMPORTANT carousel items pour l'ajout d'images , attention à l'indentation-->
      <div class="overlay-image" style='background-image:url(https://images.pexels.com/photos/5851033/pexels-photo-5851033.jpeg?cs=srgb&dl=pexels-munbaik-cycling-clothing-5851033.jpg&fm=jpg)';></div>
        <div class="container">
          <h1>Achetez votre matériel de sport</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum blanditiis numquam nam et assumenda quis, voluptatibus neque a ipsa eos natus omnis ullam sint libero velit illo dolore earum obcaecati?</p>
          <a href="#" class="btn btn-lg btn-primary">
            Achetez maintenant
          </a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style='background-image:url(https://images.pexels.com/photos/3768730/pexels-photo-3768730.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1)';>        
        </div>
        <div class="container">
          <h1>Choisissez votre diét et complément alimentaire</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum blanditiis numquam nam et assumenda quis, voluptatibus neque a ipsa eos natus omnis ullam sint libero velit illo dolore earum obcaecati?</p>
          <a href="#" class="btn btn-lg btn-primary">
            Inscrivez-vous
          </a>
        </div>
      </div>
    </div>
    <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide='prev'>
      <span class="sr-only">Précédent</span>
      <span class="carousel-control-prev-icon" aria-hidden='true'></span>
    </a>
    <a href="#myCarousel" class="carousel-control-next" role="button" data-slide='next'>
      <span class="sr-only">Précédent</span>
      <span class="carousel-control-next-icon" aria-hidden='true'></span>
    </a>
  </div>
  <!-- Section Blog-->
  <section id='blog'>
    <!--heading-->
    <div class="blog-heading">
      <span>articles récents</span>
      <h3> PlayWith</h3>
    </div>
    <!-- Blog-container-->
    <div class="blog-container">
      <!--Box1------>
      <div class="blog-box">
        <!---img--->
        <div class="blog-img">
          <img src="..\blog\images\PexelsDariaDiet.jpg" alt="Diet">
        </div>
        <div class="blog-text">
          <span> 30 July 2022 / Web Design</span>
          <!--Call Template Spécifique pour chq page Nav-->
          <a href="..\blog\templates\articles.php" class='blog-title'>What a Game</a>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur voluptatem nemo saepe facilis assumenda dolore earum mollitia, accusamus repellendus alias dolorum nostrum voluptate recusandae reprehenderit magnam perspiciatis, est placeat pariatur.</p>
          <!--Call Template Spécifique pour chq page Nav-->
          <a href="#">Read More</a>
        </div>
      </div>   
      <!--Box2------>
      <div class="blog-box">
          <!---img--->
          <div class="blog-img">
            <img src="../blog\images\PexelsMonstera.jpg" alt="Monstera">
          </div>
          <div class="blog-text">
            <span> 30 July 2022 / Web Design</span>
            <!--Call Template Spécifique pour chq page Nav-->
            <a href="..\blog\templates\articles.php" class='blog-title'>What a Game</a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur voluptatem nemo saepe facilis assumenda dolore earum mollitia, accusamus repellendus alias dolorum nostrum voluptate recusandae reprehenderit magnam perspiciatis, est placeat pariatur.</p>
            <!--Call Template Spécifique pour chq page Nav-->
            <a href="..\blog\templates\articles.php">Read More</a>
          </div>
      </div>
      
      <!--Box3------>
      <div class="blog-box">
          <!---img--->
          <div class="blog-img">
            <!--Call Template Spécifique pour chq page Nav-->
            <img src="../blog\images\PexelsTempera.jpg" alt="Tempera">
          </div>
          <div class="blog-text">
            <span> 30 July 2022 / Web Design</span>
            <a href="..\blog\templates\articles.php" class='blog-title'>What a Game</a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur voluptatem nemo saepe facilis assumenda dolore earum mollitia, accusamus repellendus alias dolorum nostrum voluptate recusandae reprehenderit magnam perspiciatis, est placeat pariatur.</p>
            <!--Call Template Spécifique pour chq page Nav-->
            <a href="..\blog\templates\articles.php">Read More</a>
          </div>
        </div>
    </div>
</div>
  </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>