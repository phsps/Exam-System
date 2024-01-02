<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mdb.min.css">
    <link rel="stylesheet" href="./css/prev&next.css">
    <link rel="stylesheet" href="./css/examPage.css">
    <title>Document</title>
</head>
<body>
  
    <div class="container">
            

        <div class="exam__content">
            <div class="container">

                <!-- This is the page navbar -->
                <div class="exam__nav">
                    <div class="exam__brand mt-4"><h6>
                      <?php echo "Lawrence Segun" ?>
                    </h6></div>
                    <div class="exam__details">
                       <div class="exam__progress mt-4">
                        <div id="subject_name">
                            <?php
                              $subject = "Physics";
                              echo $subject;
                            ?>
                        </div>
                       </div>
                       <div>
                        <button class="btn review__btn mt-3"> review</button>
                       </div>
                    <div class="vertical__line"></div>
                    <div class="exam__timer mt-3">
                      <i class="fas fa-clock"></i>
                      <span class="timer__countdown" id="timer"></span> Time Left
                    </div>
                  </div>
                </div>
            </div>

            <!-- This is where the exam questions are gonna be displayed -->

            <div id="content"></div>
            
            

            <!-- This contains the previous and next icons -->
            <div class="prev__next mt-3">

                <button class="cssbuttons-io-button mr-4 prev" id="prev"> <span class="pl-4">Previous</span>
                    <div class="icon previous">
                        <i class="fas fa-arrow-left text-dark"></i>
                    </div>
                  </button>


                <button class="cssbuttons-io-button" id="next"> <span>Next</span>
                    <div class="icon next">
                      <i class="fas fa-arrow-right text-dark"></i>
                    </div>
                  </button>
            </div>
            <div class="d-flex justify-content-center mt-3">
              <button class="submit-btn" id="submit">Submit</button>
            </div>
            
            <div class="trackers"></div>
            <!-- End of prev and next icons -->
            
        </div>

    </div>


    
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/mdb.min.js"></script>
    <script src="./js/all.min.js"></script>
    <!-- <script src="./js/main.js"></script> -->
    <?php require_once './js/main.js.php'; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
