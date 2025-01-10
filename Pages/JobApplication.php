<?php
session_start();
require_once "../includes/db-connection.php";

// Check if user and jobId are available in the session
if (!isset($_SESSION['user']) || !isset($_GET['jobId'])) {
    die("Access Denied! User or Job not found.");
}

$jobId = $_GET['jobId'];
$userId = $_SESSION['userId']; 
$conn = connectDB();

$sql = "SELECT title FROM jobs WHERE id = $jobId";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Invalid Job ID!");
}

$job = mysqli_fetch_assoc($result);
$jobTitle = htmlspecialchars($job['title']);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for <?= $jobTitle ?></title>
    <link rel="stylesheet" href="../styles/generalStyles.css">
    <link rel="stylesheet" href="../styles/JobApplication/apply-form.css">
</head>
<body>
    <div class="form-container">
        <h1>Apply for <?= $jobTitle ?></h1>
        <form action="../controllers/apply-for-job.php" method="POST" enctype="multipart/form-data">
            <!-- these hidden values will be posted once form is submitted -->
            <input type="hidden" name="jobId" value="<?= $jobId ?>">
            <input type="hidden" name="userId" value="<?= $userId ?>">
            
            <div class="form-group">
                <label for="experience">Experience (Years):</label>
                <input type="number" name="experience" id="experience" min="0" required>
            </div>

            <div class="form-group">
                <label for="joiningDate">Expected Joining Date:</label>
                <input type="date" name="joiningDate" id="joiningDate" required>
            </div>

            <div class="form-group">
                <label for="cv">Upload CV:</label>
                <input type="file" name="cv" id="cv" accept=".pdf" required >
            </div>

            <div class="form-group">
                <label for="coverLetter">Cover Letter:</label>
                <textarea name="coverLetter" id="coverLetter" rows="5" placeholder="Write a brief cover letter..." required></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit Application</button>
        </form>
    </div>

    <script>
        // FORM VALIDATION AT FRONTEND
        // Also done at BACKEND
        document.getElementById('applicationForm').addEventListener('submit', function (event) {
        const fields = {
            experience: document.getElementById('experience').value.trim(),
            joiningDate: document.getElementById('joiningDate').value.trim(),
            cv: document.getElementById('cv').files[0],
            coverLetter: document.getElementById('coverLetter').value.trim()
        };

        let errorMessage = '';
        const today = new Date();

        if (!fields.experience || isNaN(fields.experience) || fields.experience < 0) {
            errorMessage += 'Experience must be a valid number >= 0.\n';
        }
        const selectedDate = new Date(fields.joiningDate);
        if (!fields.joiningDate || selectedDate < today) {
            errorMessage += 'Joining date is required and cannot be in the past.\n';
        }
        if (!fields.cv || !fields.cv.name.endsWith('.pdf')) {
            errorMessage += 'Please upload a valid CV in PDF format.\n';
        }
        if (fields.coverLetter.length < 50) {
            errorMessage += 'Cover letter must be at least 50 characters long.\n';
        }
        if (errorMessage) {
            event.preventDefault();
            alert(errorMessage);
        }
    });
    </script>
</body>
</html>
