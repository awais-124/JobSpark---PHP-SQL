<?php

require_once '../../includes/db-connection.php';

$conn = connectDB();

// Fetch jobs from the database
$query = "SELECT jobs.id, jobs.title, jobs.companyName, jobs.location, jobs.status, categories.title AS category
          FROM jobs
          INNER JOIN categories ON jobs.category = categories.id";
$result = $conn->query($query);
$i=0;
?>
<div class="container">
    <h2 class="mt-4">Job List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($job = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= ++$i; ?></td>
                    <td><?= htmlspecialchars($job['id']) ?></td>
                    <td><?= htmlspecialchars($job['title']) ?></td>
                    <td><?= htmlspecialchars($job['companyName']) ?></td>
                    <td><?= htmlspecialchars($job['location']) ?></td>
                    <td><?= htmlspecialchars($job['category']) ?></td>
                    <td><?= htmlspecialchars($job['status']) ?></td>
                    <td>
                        <form method="post" action="../../jobSpark/admin/handlers/delete-job.php">
                            <input type="hidden" name="jobId" value="<?= htmlspecialchars($job['id']) ?>">
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
