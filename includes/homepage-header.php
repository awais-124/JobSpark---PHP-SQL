<?php 
$currentPage = 'Home';
include '../includes/applicant-header.php';
?>

<!-- JS CODE TO HANDLE NAV BAR RESPONSIVE NESS ON MOBILE DEVICES -->
<script>
    const hamBurger = document.querySelector('.ham-burger');
    const navLinks = document.querySelector('.nav-links');
    const toggleClasses = () => navLinks.classList.toggle('active')
    hamBurger.addEventListener('click', toggleClasses);
</script>

<section class="hero">
    <div class="hero-content">
        <h1>Find your dream job now</h1>
        <h6>Kickstart your career journey with JobSpark</h6>
        <div class="search-box">
            <form class="search-form">
                <div class="input-wrapper">
                    <img src="../assets/icons/search.png" alt="search-icon" class="search-icon">
                    <input type="text" placeholder="Search jobs, companies, or keywords" class="search-input">
                </div>
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
    </div>
    <div class="image-animation-container">
        <div class="rotating-circle">
            <div class="image-container">
                <img src="../assets/images/hiring.png" alt="Job Image 1">
            </div>
            <div class="image-container">
                <img src="../assets/images/laptop.png" alt="Job Image 2">
            </div>
            <div class="image-container">
                <img src="../assets/images/apply.png" alt="Job Image 3">
            </div>
        </div>
    </div>
</section>