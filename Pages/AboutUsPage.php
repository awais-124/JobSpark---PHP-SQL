<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Job Spark</title>
    <link rel="stylesheet" href="../styles/AboutUsPage/styles.css">
    <link rel="stylesheet" href="../styles/generalStyles.css">
    <link rel="stylesheet" href="../styles/HomePage/header.css">
    <link rel="stylesheet" href="../styles/HomePage/contact-section.css">
    <link rel="stylesheet" href="../styles/HomePage/footer.css">
    <link rel="stylesheet" href="../styles/HomePage/common-styles.css">

    <!-- The navbar and footer is same as Homepage so style
     are used from there.-->

</head>

<!-- 

    This page is made responsive using
    MEDIA QUERIES. styles in `./styles/AboutUsPage/styles.css`

-->
<body class="bg-light">
    <?php 
        $currentPage = 'About';
        include_once '../includes/applicant-header.php'
    ?>

    <!-- JS CODE TO HANDLE NAV BAR RESPONSIVE-NESS ON MOBILE DEVICES -->
    <script>
        const hamBurger = document.querySelector('.ham-burger');
        const navLinks = document.querySelector('.nav-links');
        const toggleClasses = () => navLinks.classList.toggle('active')
        hamBurger.addEventListener('click', toggleClasses);
    </script>

    <section class="main-section">
        <div class="content">
            <h1 class="heading">About Us</h1>
            <p class="sub-heading">Empowering Job Seekers and Employers</p>
        </div>
    </section>

    <section class="info-section">
        <div class="info-box">
            <h3 class="info-heading">Our Vision</h3>
            <p class="info-text">
                We are a leading job portal company focused on connecting employers with the best talent available. Our platform is designed to simplify the hiring process for employers and help job seekers find their ideal roles, all with the click of a button. Whether you're looking for a full-time position, a part-time job, or freelance opportunities, we provide a seamless experience for both job seekers and recruiters.
            </p>
        </div>
        <div class="info-box">
            <h3 class="info-heading">Our Mission</h3>
            <p class="info-text">
                Our mission is to bridge the gap between job seekers and employers by creating a platform that is both intuitive and effective. We are dedicated to helping individuals grow in their careers while helping organizations find the right people to contribute to their success. By offering tools for resume building, job alerts, and a user-friendly interface, we aim to create a supportive environment for career growth and recruitment success.
            </p>
        </div>
        <div class="info-box">
            <h3 class="info-heading">Our Core Values</h3>
            <p class="info-text">
                Integrity, inclusivity, and innovation are at the heart of everything we do. We believe in providing a platform that is accessible and fair to everyone, regardless of background or industry. By fostering a culture of transparency and continuous improvement, we strive to create a community where talent can thrive and employers can find the perfect fit.
            </p>
        </div>
        <div class="info-box">
            <h3 class="info-heading">What We Offer</h3>
            <p class="info-text">
                From personalized job recommendations to a resume builder and skill assessments, we offer a wide range of tools to empower both job seekers and recruiters. Our platform supports you at every stage—whether you're exploring opportunities or looking to make the perfect hire. We aim to be a one-stop solution that grows with you.
            </p>
        </div>
    </section>


    <section class="contact-container-full" id="contact">
        <div class="contact-container">
            <div class="contact-header">
                <h2>Contact Us</h2>
            <p>Get in touch with us for any inquiries or support</p>
        </div>
        
        <div class="contact-content">
            <div class="contact-links">                
                <div class="link-group">
                    <h4>For Job Seekers</h4>
                    <ul class="link-list">
                        <li><a href="#">Search Jobs</a></li>
                        <li><a href="#">Upload Resume</a></li>
                        <li><a href="#">It Jobs</a></li>
                        <li><a href="#">Business Jobs</a></li>
                    </ul>
                </div>

                <div class="link-group">
                    <h4>For Employers</h4>
                    <ul class="link-list">
                        <li><a href="#">Post a Job</a></li>
                        <li><a href="#">Search Companies</a></li>
                        <li><a href="#">Filter candidates</a></li>
                        <li><a href="#">Check posted jobs</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="contact-info">                
                <div class="contact-info-item">
                    <h4>Our Office</h4>
                    <p>Plot No. 24, Sector I-9/3</p>
                    <p>Blue Area, Near PTCL HQ</p>
                    <p>Islamabad, Pakistan 44000</p>
                </div>

                <div class="contact-info-item">
                    <h4>Contact Details</h4>
                    <p>Phone: +92 326 9872844</p>
                    <p>Email: bcs221093@jobspark.com</p>
                    <p>Hours: Mon-Fri, 9:00 AM - 6:00 PM (PST)</p>
                </div>
                
                <div class="contact-info-item">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#" title="Facebook">FB</a>
                        <a href="#" title="Twitter">TW</a>
                        <a href="#" title="LinkedIn">IN</a>
                        <a href="#" title="Instagram">IG</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

   <footer>
        <p>&copy; 2024 JobSpark @BCS221093. All rights reserved.</p>
    </footer>

</body>
</html>
