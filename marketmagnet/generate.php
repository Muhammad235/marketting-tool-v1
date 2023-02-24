<?php
error_reporting(0);

require __DIR__. '/vendor/autoload.php';

use \Orhanerday\OpenAi\OpenAi;



//require_once realpath(__DIR__. "/vendor/autoload.php");
// use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

//$api_key = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {





$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['product'];
$image = $_POST['image'];

$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => 'Write 5 marketing social media caption for'.$prompt,
    'temperature' => 0.9,
    'max_tokens' => 350,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

$response = json_decode($complete, true);
$response = $response["choices"][0]["text"];

$complete = $open_ai->image([
    "prompt" => "$image",
    "n" => 1,
    "size" => "256x256",
    "response_format" => "url",
 ]);

 $image = json_decode($complete, true);
 $image = $image["data"]["0"]["url"];

}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MarketMagnet</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>

.prompt-form label{
  padding-bottom: 8px;
}
.prompt-form{
  width: 100%;
  border-top: 3px solid #47b2e4 !important;
  border-bottom: 3px solid #47b2e4 !important;
  padding: 30px !important;
  background: #fff !important;
  box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12) !important;
}

 .form-group {
  padding-bottom: 5px;
}

.prompt-form input:focus {
  border-color: #47b2e4 !important;
}



</style>
<body>
    

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>The perfect marketing caption, hashtags and images for your product</h2>
            </div>
  
            <div class="col-lg-7 mx-auto mt-5 mt-lg-0 d-flex align-items-stretch ">

              <form action="" method="POST" role="form" class="prompt-form">

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Product Name</label>
                    <input type="text" name="product" class="form-control" id="name" placeholder="e.g shoe, burger" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Product image type</label>
                    <input type="text" class="form-control" name="image" id="email" placeholder="e.g shoe, burger" >
                  </div>
                </div>
              
               <div class="text-center mt-5"><button type="submit" name="submit" class="generate">Generate</button></div>

               <script>
                
               </script>

               <p class="generating">Generating...</p>

               <script>
                    let generate = document.querySelector('.generate');
                        let generating = document.querySelector('.generating');


                        generate.onclick = function() {
                      generating.style.display = "block";
                  };

               </script>

                <div class="copy-text">
  
                    <div class="text">
                      <?php if (!isset($_POST['submit'])) {
                       echo "";
                        }else {
                          echo $response;
                        } ?>
                    </div>

                  <?php 

                  if (isset($_POST['submit'])) {
                  ?> 

                  <button class="btn-copy-text" ><i class='bx bxs-copy-alt'></i></button>
                  <?php
                  }
                  ?>
                </div>


                  <div class="product-image text-center" style="padding-top: 70px;">
                    <img src="<?= $image ?>" alt="">
                  </div>
                  
                  <p class="feedback">Your feedback will help us improve</p>
                  <p><a href="index.php" >Give feedback</a></p>
              </form>
              
            </div>
            
          </div>
  
        </div>
        
      </section><!-- End Contact Section -->


<script>
    let copyText = document.querySelector('.copy-text');

    copyText.querySelector("button").addEventListener("click", function(e){
      e.preventDefault();
        let input = document.querySelector(".text");
        let range = document.createRange();
        range.selectNode(input);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        copyText.classList.add("active");
        window.getSelection().removeAllRanges();
        setTimeout(function(){
            copyText.classList.remove("active");
        }, 2500);

    })

</script>

        <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">


          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

  
        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>