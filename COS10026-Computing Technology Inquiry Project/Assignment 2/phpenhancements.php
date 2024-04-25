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
    <title>Enhancements MinTecK</title>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main id="Enhancements2-Main">
        <!-- Description of first enhancement: Sorting -->
        <section class="Enhancements2-Section">
            <div class="Enhancements2-Headings">
                <h2>Enhancement 1</h2>
                <h3>Sorting</h3>
            </div>
            <div class="Enhancements2-Contents">
                <div class="Enhancements2-Images-Container">
                    <img src="images/sortingScrnshot.png" alt="Sorting enhancement">
                </div>
                <div class="Enhancements2-Text-Containers">
                    <p>This enhancement provide the manager with the ability to select a field to sort the EOI records</p>
                    <p>
                        It is employed by adding an extra form containing a select input into the manager page. When the manager select a field and press "Sort", the form is submitted to the manage.php itself. To handle this submission, a block of php codes is added if the mentioned select field is set. If it is, the order of the EOI table will be suplemented to the query. Otherwise, the EOI table is displayed with its default order.
                    </p>  
                    <p>No reference was needed for this enhancement because we worked this out on our own.</p>
                    <div class="Div-Button"><a href="manage.php">Sorting in manage page</a></div>
                </div>  
            </div>
        </section>
    <!-- Description of first enhancement: Login/Logout -->
        <section class="Enhancements2-Section">
            <div class="Enhancements2-Headings">
                <h2>Enhancement 2</h2>
                <h3>Login/logout page</h3>
            </div>
            <div class="Enhancements2-Contents">
                <div class="Enhancements2-Images-Container">
                    <img src="images/loginScrnshot.png" alt="Login enhancement">
                </div>
                <div class="Enhancements2-Text-Containers">
                    <p>Details on the login page:</p>
                    <ul>
                        <li>A different table is created to store user IDs and passwords.</li>
                        <li>Set up sessions to handle user logins, making sure they are secure.</li>
                        <li>Set a limit of 3 login attempts. If the username or password is incorrect, they have to wait.</li>
                        <li>Make sure the user is redirected if trying to access the login page through the URL.</li>
                    </ul>
                    <p>Reference: we learned about PHP sessions from <a class="Enhancements-ref" href="https://www.w3schools.com/">w3schools.com</a> and <a class="Enhancements-ref" href="https://www.tutorialspoint.com/php/php_sessions.htm">tutorialspoint</a></p>
                    <div class="Div-Button"><a href="enhancement1.php">Login</a></div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>