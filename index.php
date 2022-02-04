<!DOCTYPE html>
<html  >
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
  <title>A T I</title>

</head>
<body>
<?php
            include "header.php";
        ?>
    
   <section>
       
   
        <img src="pic/ati.jpg" class="ati">
        <div class="content">
            <div class="textBox">

                <h2>Advanced Technical Institute</h2>
                <p>The Sri Lanka Institute of Advanced Technological Education is a statutory body in Sri Lanka coming under the purview of the Higher Education Ministry and offering Higher National Diploma courses. At present, it manages and supervises
                    eighteen provincial Advanced Technological Institutes throughout the island.</p>
                <a href="#">Read More</a>

            </div>
        </div>

        <ul class="sci">
            <li>
                <a href="#" style="--i:11;"><img src="pic/twitter.png"></a>
            </li>
            <li>
                <a href="#" style="--i:12;"><img src="pic/linkedin.png"></a>
            </li>
            <li>
                <a href="#" style="--i:13;"><img src="pic/Facebook.png"></a>
            </li>
        </ul>
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Nunito', sans-serif;
}

section {
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 80px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    overflow: hidden;
}

.content {
    position: relative;
    display: flex;
}

.content .textBox p {
    max-width: 550px;
    position: relative;
    text-align: justify;
    font-size: 1.0em;
    color: #333;
    opacity: 0;
    animation: slide_left 0.5s linear forwards;
    animation-delay: 1.75s;
}
@keyframes slide_left {
    0% {
        transform: translateX(100px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}

.content .textBox h2 {
    color: #0169b2;
    position: relative;
    max-width: 550px;
    font-size: 2.8em;
    margin-bottom: 10px;
    line-height: 1.2em;
    font-weight: 700;
    opacity: 0;
    animation: slide_right 0.5s linear forwards;
    animation-delay: 1.5s;
}

@keyframes slide_right {
    0% {
        transform: translateX(100px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}

.content .textBox a {
    display: inline-block;
    margin-top: 20px;
    padding: 15px 20px;
    background: #ff5e8e;
    color: #fff;
    font-size: 1.2em;
    border-radius: 40px;
    font-weight: 700;
    letter-spacing: 1px;
    text-decoration: none;
    opacity: 0;
    animation: slide_right 0.5s linear forwards;
    animation-delay: 2s;
}

.sci {
    position: absolute;
    bottom: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.sci li {
    list-style: none;
}

.sci li a {
    position: relative;
    display: inline-block;
    margin-right: 15px;
    width: 50px;
    height: 50px;
    background: #0169b2;
    border-radius: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.2s ease-in-out;
    opacity: 0;
    animation: slide_top 0.5s linear forwards;
    animation-delay: calc(0.2s * var(--i));
}

.sci li a img {
    filter: invert(1);
    transform: scale(0.5);
}

.sci li a:hover {
    background: #ff5e8e;
    transform: translateY(-10px);
}

.ati {
    position: absolute;
    bottom: 0;
    right: 0;
    max-width: 850px;
    opacity: 0;
    animation: fade_in 1s linear forwards;
    animation-delay: 3.5s;
}

@keyframes fade_in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}


/*make it responsive*/

@media(max-width: 991px) {
    section {
        padding: 150px 20px;
    }
    header {
        padding: 70px;
    }
    .navigation {
        display: none;
    }
    .navigation.active {
        position: fixed;
        top: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    header ul li {
        margin-left: 10px 0;
    }
    header ul li a {
        margin-left: 0;
        font-size: 1.0em;
    }
    .toggle {
        position: fixed;
        top: 20px;
        right: 20px;
        width: 30px;
        height: 30px;
        background: #0169b2 url(pic/menu.png);
        background-size: 30px;
        background-repeat: on-repeat;
        background-position: center;
        cursor: pointer;
        z-index: 1000;
    }
    .toggle.active {
        background: #0169b2 url(pic/close.png);
        background-size: 30px;
        background-repeat: on-repeat;
        background-position: center;
    }
    .ati {
        max-width: 400px;
    }
    .content .textBox h2 {
        font-size: 2.0em;
    }
    .content .textBox p {
        font-size: 0.5em;
    }
}

@media(max-width: 600px) {
    .ati {
        opacity: 0.4 !important;
    }
}


/* make it animated */
    </style>


    <script>
        const menuToggle = document.querySelector('.toggle');
        const navigation = document.querySelector('.navigation');
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active')
            navigation.classList.toggle('active')
        }
    </script>
  </body>
</html>