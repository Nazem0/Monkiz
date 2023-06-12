<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منقذ</title>
    <link rel="shortcut icon" href="./assets/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/landing_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .gap {
            gap: 2.5em;
        }
    </style>
    <?php
    include_once("index_data.php")
    ?>
</head>

<body>

    <div id="MainSection" class="bg-primary bg-gradient">
        <nav class="navbar navbar-expand-lg bg-transparent justify-content-end w-100">
            <a class="navbar-brand flex-grow-1 text-white" href="#"><img id="logo" src="./assets/img/logo.png"
                    alt="">Monkiz</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link text-white active" href="./urgent/">Urgent Repair</a>
                    <a class="nav-item nav-link text-white" href="./mc_profiles/">Maintenance Center</a>
                    <a class="nav-item nav-link text-white" href="./about_us/">About Us</a>
                    <a class="nav-item nav-link text-white" href="./contact_us/">Contact Us</a>
                    <a class="nav-item nav-link text-white" href="./login/">Login</a>
                    <a class="nav-item nav-link text-white" href="./register/">Register</a>
                </div>
            </div>
        </nav>
        <div id="HerosSection" class="d-flex justify-content-center text-white">
            <div id="HerosSection_Section_One">
                <h1>Car repair & servicing made easy</h1>
                <p>A fair price in seconds, mechanics you can trust, next-day service at your door</p>
                <div></div>
                <div id="Car_Locaion">
                    <input type="text" name="CarModel" id="CarModel" placeholder="Your Car Model">
                    <input type="text" name="CarModel" id="CarModel" placeholder="Your Location">
                </div>
                <input id="LocateButton" type="button" value="Locate">
            </div>
            <div id="HerosSection_Section_Two">
                <img src="assets/img/Mechanic_Picture1.png" alt="">
            </div>
        </div>
    </div>
    <div id="Emergency">
        <h2>Urgent Repair</h2>
        <div id="BookTrustedMechanic">
            <div class=" BookTrustedMechanic_Card">
                <img class="BookTrustedMechanic_Card_img" src="assets/img/24-7.png" alt="">
                <h3>Any Time</h3>
                <p>Our emergency service is available 24/7 to help you in case of car breakdowns or accidents</p>
            </div>
            <div class="BookTrustedMechanic_Card">
                <img class="BookTrustedMechanic_Card_img" src="assets/img/Mechanic.png" alt="">
                <h3>Any Where</h3>
                <p>Our mechanic will come to your location to diagnose and repair the issue on site.</p>
            </div>
            <div class="BookTrustedMechanic_Card">
                <img class="BookTrustedMechanic_Card_img" src="assets/img/winsh.png" alt="">
                <h3>Transport and Repair</h3>
                <p>If the problem requires more extensive repairs, we offer a reliable transportation for your
                    vehicle
                    to the nearest garage.</p>
            </div>
        </div>

    </div>
    <div id="Section_3">
        <h2>Book a trusted mechanic in just a few clicks</h2>
        <div id="BookTrustedMechanic">

                <div class="BookTrustedMechanic_Card">
                    <img class="BookTrustedMechanic_Card_img"
                        src="https://res.cloudinary.com/clickmechanic/image/asset/f_auto,q_auto/choose-repairs-a22f70e53528aac2064f510b59a7b8fd.png"
                        alt="">
                    <h3>Choose your repairs</h3>
                    <p>Select your car, tell us what's wrong, and we'll find the right mechanic for you.</p>

                </div>
                <div class="BookTrustedMechanic_Card">
                    <img class="BookTrustedMechanic_Card_img"
                        src="https://res.cloudinary.com/clickmechanic/image/asset/f_auto,q_auto/choose-location-ce970a74114b45967dc7df82f6943bb9.png"
                        alt="">
                    <h3>Pick a date, time & location</h3>
                    <p>Your mechanic will come to whichever address suits you best, at the date and time of your choice.
                    </p>
                </div>
                <div class="BookTrustedMechanic_Card">
                    <img class="BookTrustedMechanic_Card_img"
                        src="https://res.cloudinary.com/clickmechanic/image/asset/f_auto,q_auto/relax-5aa083bf482bfe8b4f6c0645d96cee94.png"
                        alt="">
                    <h3>Sit back and relax!</h3>
                    <p>No need to go to the garage - just sit back, grab a drink, and enjoy your favourite show.</p>
                </div>
        </div>
    </div>

    <div id="Section_4">
        <h2>Our Services</h2>
        <div id="Section_4_Contatiner">
            <div class="Section_in_4">
                <h3 class="Section_in_4_title">Popular services</h3>
                <?php
                foreach($popular_services as $item)
                {
                echo"
                <div class='ServiceCard'>
                    <img class='ServiceLogo' src=$item[img] alt=''>
                    <span>$item[name]</span>
                </div>";
            };
            ?>
                
            </div>
            <div class="Section_in_4">
                <h3 class="Section_in_4_title">Describe the problem</h3>
                <?php
                foreach($problems as $item)
                {
                echo"
                <div class='ServiceCard'>
                    <img class='ServiceLogo' src=$item[img] alt=''>
                    <span>$item[name]</span>
                </div>";
            };
            ?>
            </div>
        </div>
    </div>
    <div id="Section_5">
        <div id="Section_5_1">
            <h2>Apply to be a mechanic</h2>
            <p>Join ClickMechanic as a mechanic or garage and accept the work you want. Free to join, with great
                perks and discounts.</p>
            <button>Work With Monkiz</button>
        </div>
        <div id="Section_5_2">
            <img id="Section_5_2_img" src="assets/img/Mechanic_Picture2.png" alt="">
        </div>
    </div>
    <div id="footer">
        <div id="footer_section_1">
            <a href=""><img
                    src="https://d3gy0ut0yulpjd.cloudfront.net/assets/icons/facebook-fda6e6f5afef636a52656802012d4312a759770720ca6b7e12015db7de4b6992.svg"
                    alt=""></a>
            <a href=""><img
                    src="https://d3gy0ut0yulpjd.cloudfront.net/assets/icons/twitter-aeadb0a363efa65aaf69b5d8bfcdd2472e3f2aead97fcd907fcb99857d70aa8c.svg"
                    alt=""></a>
        </div>
        <div id="footer_section_2">
            <div class="footer_section_2_">
                <a href="">Careers</a>
            </div>
            <div class="footer_section_2_">
                <a href="">Frequently Asked Questions</a>
            </div>

        </div>
    </div>
    <div id="chatbot">
        <a href="chatbot.html">
            <img src="assets/img/chatbot-icon.png" alt="">
        </a>

    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
    integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
