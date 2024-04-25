<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/responsive.css" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://kit.fontawesome.com/97645aa929.js">    
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>Homepage</title>
  </head>
  <body>
    <!-- HEADER -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main class="Home">
        <article>
    <!------------- Homepage Header --------------->
        <div class="Home-Header-Background">
            <div class="Home-Header-Content">
                <h1>WE'RE IT <br> EXPERTS</h1>
                <p>Everywhere in Canada, MinTecK makes IT accessible to free up businesses to change and improve their competitiveness.</p>
                <a href="https://youtu.be/OUoIerJXpzg">Youtube Video<i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        </article>
        <article class="Home-Article">
        <!------------- Homepage Introduction --------------->
            <section class="Home-Introduction">
                <div id="Home-Intro-Brief-Content">
                    <div id="Home-Intro-Brief-Title">
                        <p><strong>Introduction</strong></p>
                    </div>
                    <div id="Home-Intro-Brief-Description">
                        <h2>WELCOME TO MinTecK, WHERE YOUR IDEAS COME TO LIFE!</h2>
                    </div>
                    <div id="Home-Intro-Brief-Content-Detail">
                        <div id="Home-Intro-Brief-Content-Facility">
                            <h3>Working Environment</h3>
                            <div id="Home-Intro-Brief-Content-Facility-Detail">
                                <p>At MinTecK, our working environment is an innovative hub buzzing with creativity and collaboration. 
                                    With state-of-the-art technology and a dynamic team of experts, we foster a culture of continuous learning and growth. 
                                    From flexible workspaces to cutting-edge tools, we provide the resources needed to turn ideas into reality. 
                                </p>
                            </div>
                        </div>
                        <div id="Home-Intro-Brief-Content-People">
                            <h3>MinTecK People</h3>
                            <div id="Home-Intro-Brief-Content-People-Detail">
                            <p>At MinTecK, our employees are the heartbeat of our success. 
                                Each member of our team brings unique expertise and passion to the table, creating a diverse and dynamic work environment. 
                                From seasoned developers to visionary leaders, we value collaboration, creativity, and continuous learning. 
                                At MinTecK, we foster a culture of empowerment and support, encouraging our employees to thrive professionally and personally. 
                                
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!------------- Homepage Jobs Introduction --------------->
            <section class="Home-Jobs-Brief">
                <div id="Home-Jobs-Brief-Image">
                    <img src="images/Job-Image.jpg" alt="Job Image">
                </div>
                <div id="Home-Jobs-Brief-Content">
                    <div id="Home-Jobs-Brief-Title">
                        <p><strong>Career</strong></p>
                    </div>
                    <div id="Home-Jobs-Brief-Description">
                        <h2>JOIN THE BEST TEAM OF IT EXPERTS</h2>
                        <p>Together, we are the force that will concretely transform businesses now to help them unlock growth</p>
                    </div>
                    <div id="Home-Jobs-Brief-Button">
                        <a href="jobs.html"> Career at MinTecK</a>
                    </div>
                </div>
            </section>
        <!------------- Homepage Images --------------->
            <section class="Home-Gallery">
                <div id="Home-Gallery-Content">
                    <div id="Home-Gallery-Title">
                        <p><strong>Gallery</strong></p>
                    </div>
                    <div id="Home-Gallery-Description">
                        <h2>MOMENTS AT MinTecK</h2>
                    </div>
                </div>
                <div id="Home-Gallery-Images">
                    <div class="Home-Gallery-Images-row"> 
                        <div class="Home-Gallery-Images-column">
                            <img src="images/Image-5.jpg" alt="Working Image">
                            <img src="images/Image-2.jpg" alt="Working Image">
                            <img src="images/Image-3.jpg" alt="Working Image">
                        </div>
                        <div class="Home-Gallery-Images-column">
                          <img src="images/Image-4.jpg" alt="Working Image">
                          <img src="images/Image-1.jpg" alt="Working Image">
                          <img src="images/Image-6.jpg" alt="Working Image">
                        </div>  
                        <div class="Home-Gallery-Images-column">
                            <img src="images/Image-7.jpg" alt="Working Image">
                            <img src="images/Image-8.jpg" alt="Working Image">
                            <img src="images/Image-9.jpg" alt="Working Image">
                        </div>
                    </div>  
                </div>

            </section>
        </article>
    </main>
        <!-- Footer -->
        <?php include 'includes/footer.inc'; ?>
  </body>
</html>