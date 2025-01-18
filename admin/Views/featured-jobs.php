<?php

require_once '../../includes/db-connection.php';
$conn = connectDB();

$featuredJobsQuery = "SELECT fj.id AS featuredId, j.title, j.companyName, j.location, j.salaryRange, j.type
                      FROM featuredJobs fj
                      INNER JOIN jobs j ON fj.jobId = j.id";
$featuredJobsResult = $conn->query($featuredJobsQuery);
$featuredJobs = $featuredJobsResult->fetch_all(MYSQLI_ASSOC);

$allJobsQuery = "SELECT id, title, companyName FROM jobs WHERE status = 'active'";
$allJobsResult = $conn->query($allJobsQuery);
$allJobs = $allJobsResult->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<div class="container">
    <h2>Featured Jobs</h2>

    <div class="mb-4">
        <h5>Add New Featured Job</h5>
        <form method="POST" action="../../jobSpark/admin/handlers/modify-featured-jobs.php">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="jobId" class="form-label">Select Job</label>
                <select class="form-select" id="jobId" name="jobId" required>
                    <option value="">-- Select a Job --</option>
                    <?php foreach ($allJobs as $job): ?>
                        <option value="<?= htmlspecialchars($job['id']); ?>">
                            <?= htmlspecialchars($job['title']) . " - " . htmlspecialchars($job['companyName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add to Featured</button>
        </form>
    </div>

    <div>
        <h5>Current Featured Jobs</h5>
        <?php if (count($featuredJobs) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Salary Range</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($featuredJobs as $index => $job): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= htmlspecialchars($job['title']); ?></td>
                            <td><?= htmlspecialchars($job['companyName']); ?></td>
                            <td><?= htmlspecialchars($job['location']); ?></td>
                            <td><?= htmlspecialchars($job['salaryRange']); ?></td>
                            <td><?= htmlspecialchars($job['type']); ?></td>
                            <td>
                                <form method="POST" action="../../jobSpark/admin/handlers/modify-featured-jobs.php" style="display:inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="featuredId" value="<?= $job['featuredId']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted">No featured jobs found.</p>
        <?php endif; ?>
    </div>
</div>
