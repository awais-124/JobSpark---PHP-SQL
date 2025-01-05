<?php
require_once '../../includes/db-connection.php';

$conn = connectDB();

// Fetch categories
function fetchAllCategories($conn) {
    $query = "SELECT id, title, (SELECT COUNT(*) FROM jobs WHERE category = categories.id) AS numberOfJobs FROM categories ORDER BY id DESC";
    $result = $conn->query($query);

    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    return $categories;
}

$categories = fetchAllCategories($conn);
?>

<div class="container mt-4">
    <h2>Category List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Number of Jobs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $index => $category): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($category['title']); ?></td>
                        <td><?= htmlspecialchars($category['numberOfJobs']); ?></td>
                        <td>
                            <form method="POST" action="../../jobSpark/admin/handlers/delete-categories.php" class="d-inline">
                                <input type="hidden" name="categoryId" value="<?= htmlspecialchars($category['id']); ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No categories found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
