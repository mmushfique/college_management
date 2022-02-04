<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blog</title>
</head>
<body>

    <?php
        include "header.php";
    ?>

<br>
<br>
<br>
<br>

<div class="container">
	<div class="card">
		<div class="box">
			<div class="content">
				<h2>01</h2>
				<h3>1st Semester Examination 2020</h3>
				<p>All the 2nd, 3rd and 4th year students who wish to 
                    sit for the End of First Semester Examination 2020, are 
                    required to submit their online examination application 
                    using the below Google form links on or before 20th of October 2021.</p>
				<a href="#">Read More</a>
				
			</div>
			
		</div>
		
	</div>
	
	<div class="card">
		<div class="box">
			<div class="content">

				<h2>02</h2>
				<h3>Student Renewals</h3>
				<p>Please note that all the students are required to renew
                     their studentship for the academic year 2020 [1st semester & 2nd semester]
                      on or before the 25th of October 2021.</p>
				<a href="#">Read More</a>
				
			</div>
		</div>
	</div>

		<div class="card">
		<div class="box">
			<div class="content">
				
				<h2>03</h2>
				<h3>Re-Scrutiny of Results</h3>
				<p>Please download the Application Form and duly filled application
                     form and relevant payment voucher should be submitted to the ATI
                      office on or before 15th October 2021.</p>
				<a href="#">Read More</a>
				
			</div>
		</div>
	</div>

    <div class="card">
        <div class="box">
            <div class="content">
                
                <h2>04</h2>
                <h3>Diploma Certificate</h3>
                <p>We wish to inform you all that People's Bank agreed to provide
                   financial facilities to purchase laptops when the discussion 
                   was had with the Director General of SLIATE.</p>
                <a href="#">Read More</a>
                
            </div>
        </div>
    </div>

    <div class="card">
        <div class="box">
            <div class="content">
                
                <h2>05</h2>
                <h3>Appeal Notice</h3>
                <p>Considering the prevailing Covid-19 crisis, an
                     opportunity to appeal is granted for shortlisted a
                     pplicants who were unable to submit soft copies of the cer
                     tificates before the deadline due to valid reasons.</p>
                <a href="#">Read More</a>
                
            </div>
        </div>
    </div>

    <div class="card">
        <div class="box">
            <div class="content">
                
                <h2>06</h2>
                <h3>Appeal Notice</h3>
                <p>We have noticed several students have submitted their contact
                     details incorrectly. So, make sure you submit the correct details
                      as requested.
 
 Please submit the relevant form on or before 24th July</p>
                <a href="#">Read More</a>
                
            </div>
        </div>
    </div>
</div>



<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:200;300;400;600;700;800&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #ebf5fc;
    margin-top: 75px;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    flex-wrap: wrap;
    padding: 40px 0;
}

.container .card {
    position: relative;
    width: 330px;
    height: 440px;
    box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.05), inset -5px -5px 5px rgba(255, 255, 255, 0.5), 5px 5px 5px rgba(0, 0, 0, 0.05), -5px -5px 5px rgba(255, 255, 255, 0.5);
    border-radius: 15px;
    margin: 30px;
}

.container .card .box {
    position: absolute;
    top: 20px;
    left: 20px;
    right: 20px;
    bottom: 20px;
    background: #ebf5fc;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.5s;
}

.container .card:hover .box {
    transform: translateY(-50px);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
    background: linear-gradient(45deg, #b95ce4, #4f29cd);
}

.container .card .box .content {
    padding: 20px;
    text-align: center;
}

.container .card .box .content h2 {
    position: absolute;
    top: -10px;
    right: 30px;
    font-size: 8em;
    color: rgba(0, 0, 0, 0.02);
    transition: 0.5s;
    pointer-events: none;
}

.container .card:hover .box .content h2 {
    color: rgba(0, 0, 0, 0.05);
}

.container .card .box .content h3 {
    font-size: 1.8em;
    color: #777;
    z-index: 1;
    transition: 0.5s;
}

.container .card .box .content p {
    font-size: 1em;
    font-weight: 300;
    color: #777;
    z-index: 1;
    transition: 0.5s;
}

.container .card:hover .box .content h3,
.container .card:hover .box .content p {
    color: #fff;
}

.container .card .box .content a {
    position: relative;
    display: inline-block;
    padding: 8px 20px;
    background: #03a9f4;
    margin-top: 15px;
    border-radius: 20px;
    color: #fff;
    text-decoration: none;
    text-align: center;
    font-weight: 400;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.container .card:hover .box .content a {
    background: #ff568f;
}
</style>


</body>
</html>