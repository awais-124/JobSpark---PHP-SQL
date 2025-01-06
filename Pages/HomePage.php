<?php
session_start();
require_once '../includes/db-connection.php';
require_once '../includes/helper-functions.php';
$conn = connectDB();

if(!isset($_SESSION['userId'])) {
    header('Location: LoginPage.php');
}

$categories = getCategories($conn);
$featuredJobs = getFeaturedJobs($conn);
$testimonials = getRandomTestimonials($conn, 3);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/generalStyles.css">
    <link rel="stylesheet" href="../styles/HomePage/header.css">
    <link rel="stylesheet" href="../styles/HomePage/hero-section.css">
    <link rel="stylesheet" href="../styles/HomePage/categories-section.css">
    <link rel="stylesheet" href="../styles/HomePage/popular-jobs-section.css">
    <link rel="stylesheet" href="../styles/HomePage/companies-section.css">
    <link rel="stylesheet" href="../styles/HomePage/stats-section.css">
    <link rel="stylesheet" href="../styles/HomePage/testimonials-section.css">
    <link rel="stylesheet" href="../styles/HomePage/contact-section.css">
    <link rel="stylesheet" href="../styles/HomePage/footer.css">
    <link rel="stylesheet" href="../styles/HomePage/common-styles.css">
    <title>JobSpark - Your Dream Jobs</title>
</head>

<!--
    The styles of each section is in different file mentioned in comments
    and common styles and responsiveness styles are in 
    common-styles.css in ./styles/HomePage/
-->

<body>
    <?php include_once('../includes/homepage-header.php') ?>

    <!-- Popular Job Categories Sections  - STYLES in categories-section.css-->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Popular Job Categories</h2>
            <div class="categories-grid">
                <?php foreach ($categories as $category): ?>
                <a href="JobsListing.php?category=<?php echo $category['id']; ?>" class="category-card">
                    <div class="category-info">
                        <div>
                            <div class="category-name"><?php echo htmlspecialchars($category['name']); ?></div>
                            <div class="job-count"><?php echo htmlspecialchars($category['job_count']); ?> jobs</div>
                        </div>
                        <div>→</div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Featured Jobs  - STYLES in popular-jobs-sections.css-->
    <section class="featured-jobs" id="jobs-section">
        <div class="container">
            <h2 class="section-title">Featured Jobs</h2>
            <div class="jobs-grid">
                <?php foreach ($featuredJobs as $job): ?>
                <div class="job-card">
                    <div class="card-header">
                        <h3 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="job-details"><?php echo htmlspecialchars($job['companyName']); ?></div>
                        <div class="job-details"><?php echo htmlspecialchars($job['location']); ?></div>
                        <div class="job-details"><?php echo htmlspecialchars($job['salaryRange']); ?> • <?php echo htmlspecialchars($job['duration']); ?></div>
                        <a href="#" class="view-job" data-job-id="<?php echo $job['id']; ?>">View Details →</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Modal for Featured Job Details -->
    <div id="jobModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-job-details"></div>
        </div>
    </div>
    <script src="../js/featuredJobsModal.js"></script>
    

    <!-- Statistics  - STYLES in stats-section.css-->
    <?php include_once('../includes/homepage-stats.php') ?>


    <!-- Testimonial Section - STYLES in testimonials-section.css -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Users Say</h2>
            <div class="testimonials-grid">
                <?php 
                foreach ($testimonials as $index => $testimonial): 
                    $cardClass = ($index === 1) ? 'testimonial-card accent' : 'testimonial-card';
                ?>
                    <div class="<?php echo $cardClass; ?>">
                        <div class="quote-icon">"</div>
                        <p class="testimonial-text">
                            <?php echo htmlspecialchars($testimonial['review']); ?>
                        </p>
                        <div class="testimonial-author">
                            <div class="author-img">
                                <img src="../assets/images/<?php echo htmlspecialchars($testimonial['image']); ?>" 
                                    alt="<?php echo htmlspecialchars($testimonial['name']); ?>">
                            </div>
                            <div class="author-info">
                                <h4 class="author-name"><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                                <p class="author-role"><?php echo htmlspecialchars($testimonial['occupation']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if (empty($testimonials)): ?>
                    <div class="no-testimonials">
                        <p>No testimonials available at the moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Featured Companies  - STYLES in companies-section.css-->
    <?php include_once('../includes/homepage-companies.php') ?>
    
    <!-- Footer Section  - STYLES in footer.css -->
    <?php include_once('../includes/footer.php') ?>
</body>
</html>