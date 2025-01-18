<?php

require_once '../../includes/db-connection.php';

$conn = connectDB();

$query = "SELECT 
            applicants.id AS applicant_id, 
            users.fullname, 
            users.email, 
            users.phone, 
            jobs.title AS job_title, 
            applicants.cv, 
            applicants.status 
          FROM applicants
          INNER JOIN users ON applicants.userId = users.userId
          INNER JOIN jobs ON applicants.jobId = jobs.id";
$result = $conn->query($query);

?>
<div class="container">
    <h2 class="mt-4">Applicant List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Applied Job</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($applicant = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($applicant['applicant_id']) ?></td>
                    <td><?= htmlspecialchars($applicant['fullname']) ?></td>
                    <td><?= htmlspecialchars($applicant['email']) ?></td>
                    <td><?= htmlspecialchars($applicant['phone']) ?></td>
                    <td><?= htmlspecialchars($applicant['job_title']) ?></td>
                    <td>
                        <form method="post" action="../../jobSpark/admin/handlers/delete-applicant.php" onsubmit="return confirm('Are you sure you want to delete this applicant?');">
                            <input type="hidden" name="applicantId" value="<?= htmlspecialchars($applicant['applicant_id']) ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php
$conn->close();
?>
