<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
    //generate a random CSRF token if it is not set
    $_SESSION['csrf_token'] = base64_encode(microtime() . uniqid() . mt_rand());
}
//generate a unique synchronizer value
$originalSyncValue = base64_encode(microtime() . uniqid() . mt_rand());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application form</title>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/responsive.css" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://kit.fontawesome.com/97645aa929.js">    
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>Application MinTeck</title> 
</head>

<body  id="Apply-Background">
    <!-- HEADER -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main>
        <!-- Greetings and invitation to join the company -->
        <section id="apply-section1">
            <div id="apply-heading">APPLICATION</div>
            <div id="apply-heading-description">Welcome to our company! We are looking forward to working with you. Let us know more about you by filling out the form below. Should you have any further questions, contact us at <a target="_blank" href="mailto:104933612@student.swin.edu.au">104933612@student.swin.edu.au</a>.</div>
            <div id="register"><a href="#form-caption">REGISTER</a></div>
        </section>
        <!-- Application form -->
        <section id="apply-section2">
            <!-- include the unique synchronizer value in the HTTP request -->
            <form method="post" action="processEOI.php?<?php echo http_build_query(['sync_value' => $originalSyncValue]); ?>" id="Apply-Form" novalidate="novalidate">
                <fieldset>
                    <legend id="form-caption">Application form</legend>
                    <!-- First section for basic info -->
                    <section class="form_element" id="form_section1">
                        <div>
                            <p>
                                <label for="job_ref">Job reference number</label>
                                <input class="Form-Input" type="text" id="job_ref" name="job_ref" placeholder="5 alphanumeric characters" pattern="[a-zA-Z0-9]{5}" required>
                            </p>
                            <p>
                                <label for="first_name">First name</label>
                                <input class="Form-Input" type="text" id="first_name" name="first_name" pattern="[a-zA-Z]{0,20}" placeholder="Max 20 alpha characters" required>
                            </p>
                            <p>
                                <label for="last_name">Last name</label>
                                <input class="Form-Input" type="text" id="last_name" name="last_name" pattern="[a-zA-Z]{0,20}" placeholder="Max 20 alpha characters" required>
                            </p>
                            <p>
                                <label for="dob">Date of birth</label>
                                <input class="Form-Input" type="text" id="dob" name="dob" pattern="^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$" placeholder="dd/mm/yyyy" required>
                            </p>
                        </div>

                        <div>
                            <p>
                                <label for="address">Street Address</label>
                                <input class="Form-Input" type="text" name="address" id="address" maxlength="40" placeholder="Max 40 characters" required>
                            </p>
                            <p>
                                <label for="suburb">Suburb / town</label>
                                <input class="Form-Input" type="text" name="suburb" id="suburb" maxlength="40" placeholder="Max 40 characters" required>
                            </p>
                            <p>
                                <label for="state">State</label>
                                <select name="state" id="state" required>
                                    <option value="">Please select a state</option>
                                    <option value="VIC">VIC</option>
                                    <option value="NSW">NSW</option>
                                    <option value="QLD">QLD</option>
                                    <option value="NT">NT</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="TAS">TAS</option>
                                    <option value="ACT">ACT</option>
                                </select>
                            </p>
                            <p>
                                <label for="postcode">Postcode</label>
                                <input class="Form-Input" type="text" name="postcode" id="postcode" pattern="\d{4}" placeholder="4 digits" required>
                            </p>
                            <p>
                                <label for="email">Email address</label>
                                <input class="Form-Input" type="email" name="email" id="email" placeholder="e.g. example@gmail.com" required>
                            </p>
                            <p>
                                <label for="phone">Phone number</label>
                                <input class="Form-Input" type="tel" name="phone" id="phone" pattern="[0-9 ]{8,12}" placeholder="8 - 12 digits" required>
                            </p>
                        </div>
                    </section>
                    <!-- Second section for gender and skills -->
                    <section class="form_element" id="form_section2">
                        <fieldset id="form-gender">
                            <legend>Gender</legend>
                            <p>
                                <input class="Form-Input" type="radio" name="Gender" id="male" value="Male">
                                <label for="male">Male</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="radio" name="Gender" id="female" value="Female">
                                <label for="female">Female</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="radio" name="Gender" id="notsay" value="Prefer not to say">
                                <label for="notsay">Prefer not to say</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="radio" name="Gender" id="another_gender" value="Others">         
                                <label for="another_gender">Others</label>
                            </p>
                        </fieldset>
                        
                        <fieldset id="form-skills-list">
                            <legend>Skills list</legend>
                            <p>
                                <input class="Form-Input"  type="checkbox" checked id="skill1" name="Skill1" value="Bachelor"> 
                                <label for="skill1">Bachelor's degree</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="checkbox" id="skill2" name="Skill2" value="English">
                                <label for="skill2">English</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="checkbox" id="skill3" name="Skill3" value="Teamwork">
                                <label for="skill3">Teamwork</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="checkbox" id="skill4" name="Skill4" value="Experience">
                                <label for="skill4">Work experience</label>
                            </p>
                            <p>
                                <input class="Form-Input" type="checkbox" id="skill5" name="Skill5" value="Presentation">
                                <label for="skill5">Presentation</label>
                            </p>
            
                            <p>
                                <input type="checkbox" id="other_skills">
                                <label for="other_skills">Other skills</label>
                                <br>
                                <textarea name="other_skills" cols="30" rows="10" placeholder="List your other skills here"></textarea>
                            </p>
                        </fieldset>
                    </section>
                    
                    <section id="form_buttons">
                        <input type="submit" value="Apply">
                        <input type="reset" value="Reset form">
                    </section>
                    
                </fieldset>

                <!-- hidden fields to pass csrf token to the server -->
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <input type="hidden" name="original_sync_value" value="<?php echo $originalSyncValue; ?>">

            </form>
        </section> 
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>