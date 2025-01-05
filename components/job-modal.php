<?php
require_once "../includes/db-connection.php";

$default_id = 1;
$jobId = isset($_GET['jobId']) ? intval($_GET['jobId']) : $default_id;
if (!$jobId) {
    die("Job ID not specified!");
}

$conn = connectDB();
$sql = "SELECT * FROM jobs WHERE id = $jobId";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Jobs not found!";
    exit;
}

if ($result && $job = mysqli_fetch_assoc($result)) {
    $skills = explode(',', $job['skills']); // Split skills into an array
?>
    <h2><?= htmlspecialchars($job['title']) ?></h2>
    <p><strong>Company:</strong> <?= htmlspecialchars($job['companyName']) ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
    <p><strong>Salary:</strong> <?= htmlspecialchars($job['salaryRange']) ?></p>
    <p><strong>Type:</strong> <?= htmlspecialchars($job['type']) ?></p>
    <p><strong>Duration:</strong> <?= htmlspecialchars($job['duration']) ?></p>
    <p><strong>Experience required:</strong> <?= htmlspecialchars($job['experience']) ?></p>
    <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($job['description'])) ?></p>
    <p><strong>Requirements:</strong> <?= nl2br(htmlspecialchars($job['requirements'])) ?></p>
    <p><strong>Skills:</strong></p>
    <div class="skills-container">
        <?php foreach ($skills as $skill): ?>
            <span class="skill-badge"><?= htmlspecialchars(trim($skill)) ?></span>
        <?php endforeach; ?>
    </div>
<?php
} else {
    echo "<p>Job not found!</p>";
}
?>