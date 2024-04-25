<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/responsive.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://kit.fontawesome.com/97645aa929.js">    
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>About us MinTeck</title> 
</head>
<body id="About-Us-Bacground">
    <!-- HEADER -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main>
        <!-- Greetings and invitation -->
        <section id="apply-section1">
            <div id="apply-heading">About us</div>
            <div id="apply-heading-description">Welcome to our company! We are looking forward to working with you. Let us know more about you by filling out the form below. Should you have any further questions, contact us at <a target="_blank" href="mailto:104933612@student.swin.edu.au">104933612@student.swin.edu.au</a>.</div>
            <div id="register"><a href="apply.html#form-caption">Join now</a></div>
        </section>

        <!-- Key information of group members -->
        <section class="definition">
            <h2 id="about-basic-title">Key Information</h2>
            <dl>
                <div class="about-basic">
                    <dt>Group name</dt>
                    <dd>MinTeck</dd>
                </div>
                <div class="about-basic">
                    <dt>Group ID</dt>
                    <dd>88888888</dd>
                </div>
                <div class="about-basic">
                    <dt>Tutor's name</dt>
                    <dd>Dr. Eric Le</dd>
                </div>
                <div class="about-basic">
                    <dt>Course</dt>
                    <dd>COS10026 - Computing Technology Inquiry Project</dd>
                </div>
                <div class="about-basic">
                    <dt>Email</dt>
                    <dd><a href="mailto:104993612@student.swin.edu.au">104993612@student.swin.edu.au</a></dd>
                </div>
            </dl>
            <a href="mailto:104993612@student.swin.edu.au" id="email-icon"><img src="images/about/email-icon.png" alt=""></a>

            <!-- Extra information about members' relationship -->
            <h2 id="more-info-title">More Information</h2>
            <div id="more-info-img">
                <figure>
                    <img src="images/about/avt.jpg" alt="A photo of our group members">
                    <figcaption>A photo we took together at the Vovinam class</figcaption>
                </figure>
                <figure>
                    <img src="images/about/group.jpg" alt="">
                    <figcaption>We hang out a lot, with other friends too</figcaption>
                </figure>
                <figure id="playchess">
                    <img src="images/about/playchess.jpg" alt="">
                    <figcaption>We have some common interests, like chess</figcaption>
                </figure>
            </div>
            
            <a href="mailto:104993612@student.swin.edu.au"></a>
        </section>
        <!-- Animated gallery of memorable moments -->
        <section id="sphere">
            <div id="memories-title"><h2>Our memories</h2></div>
            <div class="sphere-container">
                <div class="picture" id="picture1">
                    <img src="images/about/memories/download.jpg" alt="My group of friends">
                </div>
                <div class="picture" id="picture2">
                    <img src="images/about/memories/download(1).jpg" alt="My group of friends">
                </div>
                <div class="picture" id="picture3">
                    <img src="images/about/memories/download(2).jpg" alt="My group of friends">
                </div>
                <div class="picture" id="picture4">
                    <img src="images/about/memories/download(3).jpg" alt="Hoang Trung wearing Tet's decoration">
                </div>
                <div class="picture" id="picture5">
                    <img src="images/about/memories/download(4).jpg" alt="Gia Khang wearing Tet's decoration">
                </div>
                <div class="picture" id="picture6">
                    <img src="images/about/memories/download(5).jpg" alt="My group of friends">
                </div>
                <div class="picture" id="picture7">
                    <img src="images/about/memories/download(6).jpg" alt="My group of friends">
                </div>
            </div>
        </section>
        <!-- Schedule at Swinburne -->
        <section class="About-Timetable">
            <h2>Timetable</h2>
            <div class="Timetable-Selection">
                <label for="Monday">Monday</label>
                <label for="Tuesday">Tuesday</label>
                <label for="Wednesday">Wednesday</label>
                <label for="Thursday">Thursday</label>
                <label for="Friday">Friday</label>
                <label for="Saturday">Saturday</label>
                <label for="Sunday">Sunday</label>
            </div>
                <input type="radio" name="date" id="Monday" checked="checked">
                <input type="radio" name="date" id="Tuesday">
                <input type="radio" name="date" id="Wednesday">
                <input type="radio" name="date" id="Thursday">
                <input type="radio" name="date" id="Friday">
                <input type="radio" name="date" id="Saturday">
                <input type="radio" name="date" id="Sunday">
                <table>
                    <thead>
                        <tr>
                            <th class="Hour" id="Table-LeftTop"> Hour / Date</th>
                            <th class="Monday">Monday</th>
                            <th class="Tuesday">Tuesday</th>
                            <th class="Wednesday">Wednesday</th>
                            <th class="Thursday">Thursday</th>
                            <th class="Friday">Friday</th>
                            <th class="Saturday">Saturday</th>
                            <th class="Sunday" id="Table-RightTop">Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="Hour">7:00 - 8:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Wednesday" rowspan="5" id="Table-TNE"> TNE10006 -<br> Networks and Switching </td>
                        <td class="Thursday"></td>
                        <td class="Friday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">8:00 - 9:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Thursday"></td>
                        <td class="Friday" rowspan="4" id="Table-COS26">COS10026 - Computing Technology Inquiry Project</td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">9:00 - 10:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Thursday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">10:00 - 11:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Thursday" rowspan="2" id="Table-VOV">VOV101 - Vovinam</td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">11:00 - 12:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">12:00 - 13:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Wednesday"></td>
                        <td class="Thursday"></td>
                        <td class="Friday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">13:00 - 14:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Wednesday"></td>
                        <td class="Thursday" rowspan="3" id="Table-COS05">COS10005 - Web Development</td>
                        <td class="Friday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td class="Hour">14:00 - 15:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Wednesday"></td>
                        <td class="Friday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday"></td>
                    </tr>
                    <tr>
                        <td  class="Hour">15:00 - 16:00</td>
                            <td class="Monday"></td>
                            <td class="Tuesday"></td>
                            <td class="Wednesday"></td>
                            <td class="Friday"></td>
                            <td class="Saturday"></td>
                            <td class="Sunday"></td>
                    </tr>
                
                    <tr>
                        <td class="Hour" id="Table-LeftBottom">16:00 - 17:00</td>
                        <td class="Monday"></td>
                        <td class="Tuesday"></td>
                        <td class="Wednesday"></td>
                        <td class="Thursday"></td>
                        <td class="Friday"></td>
                        <td class="Saturday"></td>
                        <td class="Sunday" id="Table-RightBottom"></td>
                    </tr>
                    <tbody>
                </table>
        </section>       
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>