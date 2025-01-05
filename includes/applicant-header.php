<!-- Header section with Navbar - STYLES in header.css-->
<header id="header">
    <nav class="home-page-nav">
        <a href="#header" class="logo">
            <img src="../assets/logos/logo.png" alt="nav-logo">
        </a>
        <div class="nav-links">
            <?php if ($currentPage !== 'Home'): ?>
                <a href="./HomePage.php#header">Home</a>
            <?php endif; ?>
            <?php if ($currentPage !== 'JobsListing'): ?>
                <a href="./JobsListing.php">Find Jobs</a>
            <?php endif; ?>
            <a href="./HomePage.php#jobs-section">Featured Jobs</a>
            <?php if ($currentPage !== 'About'): ?>
                <a href="./AboutUsPage.php">About</a>
                <?php endif; ?>
                <a href="./AboutUsPage.php#contact">Contact</a>
            <a href="../controllers/logout.php" class="btn-logout">Logout</a>
        </div>

        <!-- Ham-burger icon for mobile devices -->
        <div class="ham-burger">
            <a href="#header" class="menu-link">
                <img src="../assets/icons/ham-burger.png" alt="ham-burger-icon">
            </a>
        </div>
    </nav>
</header>
