<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?v=1">
    <title>Nuwang</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
</head>
<body>
    <div class="loading-icon">
        <div class="center">
             <div class="span1load"></div>
             <div class="span2load"></div>
        </div>
    </div>
    <div class="load-body">
        <header class="header" id="body-header">
            <nav class="navbar">
               <div class="titles">
                    <a href="#" class="nav-logo"><img id="logo" src="./images/logo.png" alt=""> </a>
                    <a href="#" class="nav-logo" id="title-text">Nuwang.tech</a>
               </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#wedo" class="nav-link">what we do</a>
                    </li>
                    <li class="nav-item">
                        <a href="#project" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">contact us</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <i class="fa fa-bars"></i>
                </div>
            </nav>
        </header>
        <main>
            <section class="container-body body-cont1">
                <div class="container-div container-body1">
                    <div class="center-content">
                        <h1>achieve your digital ambitions.</h1>
                        <span>Providing the best software development service to startups,</span><br>
                        <a target="_blank" href="https://forms.gle/DUNa7tUpDnQAaph67" id="btn-head" style="display:inline-block">tell us what you need</a>
                    </div>
                </div>
            </section>
            <section class="container-body body-cont2" id="wedo">
                <div class="container-div container-body2">
                    <div class="center-content2">
                        <h1>what we do</h1>
                        <div class="cont2-cont">
                            <p>Nuwang uses a holistic approach to your IT and software needs. We provide you with an end-to-end service delivery – from ideation, to launching, to operating and maintaining your production servers and software – on a 24x7 basis</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container-body body-cont3" id="project">
                <div class="container-div container-body3">
                    <div class="center-content3">
                        <div class="body-cont3-3">
                            <img src="./images/img1.png" alt="">
                        </div>
                        <div class="body-cont3-3">
                            <h1>Web Application Development</h1>
                            <span>We produce award-winning mobile-responsive websites with multi-browser compatibility. Our top designers craft your websites in line with your business branding while our web developers build functional, scalable, secure, and maintainable code.</span>
                        </div>
                    </div>

                    <div class="center-content3" id="hide-this">
                        <div class="body-cont3-3">
                            <img src="./images/img2.png" alt="">
                        </div>
                        <div class="body-cont3-3">
                            <h1>Mobile Application Development</h1>
                            <span>Our mobile teams adhere to Google’s and Apple’s UI/UX coding standards, offering consults and solutions to ensure successful app launches.</span>
                        </div>
                    </div>
                    <div class="center-content3" id="show-this">
                        <div class="body-cont3-3">
                            <h1>Mobile Application Development</h1>
                            <span>Our mobile teams adhere to Google’s and Apple’s UI/UX coding standards, offering consults and solutions to ensure successful app launches.</span>
                        </div>
                        <div class="body-cont3-3">
                            <img src="./images/img2.png" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <footer id="contact">
                <div class="footer-header">
                    <ul>
                        <li class="nav-item2">
                            <a href="#wedo" >what we do</a>
                        </li>
                        <a href="#" class="nav-logo"><img id="logobottom" src="./images/logo.png" alt=""> </a>
                        <li class="nav-item2">
                            <a href="#project" >Services</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-body">
                    <h1>contact us</h1>
                    <div class="contact-cont" style="font-size:20px;color:white;">
                      <a href="tel:09121808887" style="color:white; text-decoration:underline;" >+639121808887</a> | <a  style="color:white; text-decoration:underline;" href="https://m.me/galas.william.19">Messenger</a>
                    </div>
                    <div class="contact-address">
                        <p>SAN ROQUE , TARLAC, TARLAC - PH</p>
                    </div>
                    <div class="policy">
                        <a href="#">PRIVACY POLICY</a>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61ead2d69bd1f31184d89bf3/1fpukf6en';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    <script>
         const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", mobileMenu);

        function mobileMenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }
        $(document).on('click','.container-body',function(){
            $(".nav-menu").removeClass('active');
        });
         window.addEventListener("load", function(){
            $(".loading-icon").fadeOut();

            setTimeout(function(){
            $(".load-body").show();
            }, 1000);

        });

        var scrollnum = 0;
        window.addEventListener("scroll",function(){
            var scrolltop = window.pageYOffset || document.documentElement.scrollTop;

            if(scrolltop > scrollnum){
                $(".nav-menu").removeClass('active');
            }else{
                $(".nav-menu").removeClass('active');
            }
            scrollnum = scrolltop;
        });
        //smoth
        $(".nav-menu a").on('click',function(e){
            if(this.hash !==''){
                e.preventDefault();

                const hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                },200
                );
            }
        });
    </script>
</body>
</html>
