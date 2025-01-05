<?php
session_start();
require_once '../includes/helper-functions.php';
$userId = $_SESSION['user']['userId'];

$allJobs = fetchJobsByEmployer($userId);
$activeJobs = fetchActiveJobsByEmployer($userId);
$applicants = fetchApplicantsByUser($userId);

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard - JobSpark</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/EmployerPage/employerStyles.css">
    <link rel="stylesheet" href="../styles/HomePage/footer.css">
</head>
<!-- 
    This page is made responsive using
    BOOTSTRAP. 
-->
<body class="bg-light">
    
    <?php include_once '../includes/employer-header.php'; ?>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <main class="container py-4">
        <div class="row">

            <!-- SIDE BAR (ASIDE) -->
            <?php include_once '../includes/employer-sidebar.php'; ?>

            <section class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="post-job">
                        <div class="card">
                            <div class="card-header bg-custom-primary">
                                <h4 class="m-2 text-custom-light">Job Posting Form</h4>
                            </div>
                            <div class="card-body">

                            <!-- JOB POSTING FORM -->
                             <?php include_once '../includes/post-job-form.php'; ?>  

                            </div>
                        </div>
                    </div>

                    <section class="tab-pane fade" id="applicants">
                        <div class="card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 text-custom-dark">Recent Applicants</h4>
                                <div class="input-group w-auto">
                                    <input type="text" class="form-control" placeholder="Search applicants...">
                                    <button class="btn btn-custom-primary">Search</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php if (!empty($applicants)): ?>
                                        <?php foreach ($applicants as $applicant): ?>
                                            <div class="col-md-6 mb-3">
                                                <div class="card applicant-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= htmlspecialchars($applicant['fullName']); ?></h5>
                                                        <p class="card-text">Applied for: <?= htmlspecialchars($applicant['jobTitle']); ?></p>
                                                        <p class="small text-muted">Experience: <?= htmlspecialchars($applicant['experience']); ?> years</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <?php
                                                            $cvPath = '../uploaded-files/' . htmlspecialchars($applicant['cv']);
                                                            $cvToDisplay = file_exists($cvPath) ? $cvPath : '../uploaded-files/default-cv.pdf';
                                                            ?>
                                                            <a href="<?= $cvToDisplay; ?>" target="_blank" class="btn btn-sm btn-custom-primary">View CV</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-muted">No applicants found for this job.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </section>


                    <section class="tab-pane fade" id="active-jobs">
                        <div class="card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 text-custom-dark">Active Job Listings</h4>
                                <div class="input-group w-auto">
                                    <input type="text" class="form-control" placeholder="Search jobs...">
                                    <button class="btn btn-custom-primary">Search</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($activeJobs as $job): ?>
                                        <div class="col-md-6 mb-3">
                                            <div class="card applicant-card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo htmlspecialchars($job['title']); ?></h5>
                                                    <p class="card-text text-muted mb-2"><?php echo htmlspecialchars($job['type']); ?> • <?php echo htmlspecialchars($job['location']); ?></p>
                                                    <p class="small mb-2">Salary: <?php echo htmlspecialchars($job['salaryRange']); ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-sm btn-custom-primary">View Details</button>
                                                        <form action="../controllers/delete-job.php" method="POST" class="d-inline">
                                                            <input type="hidden" name="jobId" value="<?php echo htmlspecialchars($job['id']); ?>">
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                                        </form>
                                                        <form action="../controllers/change-job-status.php" method="POST" class="d-inline">
                                                            <input type="hidden" name="jobId" value="<?php echo htmlspecialchars($job['id']); ?>">
                                                            <button type="submit" class="btn btn-sm btn-outline-success">Close Listing</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="tab-pane fade" id="all-jobs">
                        <div class="card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 text-custom-dark">All Job Listings</h4>
                                <div class="input-group w-auto">
                                    <input type="text" class="form-control" placeholder="Search jobs...">
                                    <button class="btn btn-custom-primary">Search</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($allJobs as $job): ?>
                                        <div class="col-md-6 mb-3">
                                            <div class="card applicant-card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo htmlspecialchars($job['title']); ?></h5>
                                                    <p class="card-text text-muted mb-2"><?php echo htmlspecialchars($job['type']); ?> • <?php echo htmlspecialchars($job['location']); ?></p>
                                                    <p class="small mb-2">Salary: <?php echo htmlspecialchars($job['salaryRange']); ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-sm btn-custom-primary">View Details</button>
                                                        <button class="btn btn-sm btn-custom-primary skill-badge"><?php echo strtoupper(htmlspecialchars($job['status'])); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>

     <!-- Footer Section  - STYLES in ./styles/HomePage/footer.css -->
    <footer style="background-color: #ddd; color: #000;">
        <!-- 
        INLINE STYLE USED ONLY ONCE IN PROJECT
        TO OVERWRITE MARGIN BOTTOM APPLIED BY BOOTSTRAP 
        -->
        <p style="margin-bottom: 0;">&copy; 2024 JobSpark @BCS221093. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>