<?php
require_once '../includes/db-connection.php';

if (isset($_GET['job_id'])) {
    $jobId = intval($_GET['job_id']);
    $conn = connectDB();

    // using prepared query statements to avoid SQL Injection
    $sql = "SELECT * FROM jobs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
        ?>
        <h2><?php echo htmlspecialchars($job['title']); ?></h2>
        <p><strong>Company:</strong> <?php echo htmlspecialchars($job['companyName']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
        <p><strong>Salary:</strong> <?php echo htmlspecialchars($job['salaryRange']); ?></p>
        <p><strong>Type:</strong> <?php echo htmlspecialchars($job['type']); ?></p>
        <p><strong>Duration:</strong> <?php echo htmlspecialchars($job['duration']); ?></p>
        <p><strong>Posted On:</strong> <?php echo htmlspecialchars($job['datePosted']); ?></p>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
        <p><strong>Requirements:</strong> <?php echo nl2br(htmlspecialchars($job['requirements'])); ?></p>
        <p><strong>Skills:</strong> <?php echo nl2br(htmlspecialchars($job['skills'])); ?></p>
        <p><strong>Experience:</strong> <?php echo htmlspecialchars($job['experience']); ?></p>
        <p><strong>Department:</strong> <?php echo htmlspecialchars($job['department']); ?></p>
        <form action="../Pages/JobApplication.php?jobId=<?php echo htmlspecialchars($jobId);?>" method='post'>
            <input type='hidden' name='jobId' value=<?php echo $jobId;?> >
            <button type='submit' class='apply-button'>Apply Now</button>
        </form>
        <?php
    } else {
        echo "Job details not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No job ID provided.";
}
?>