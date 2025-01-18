<?php

require_once '../../includes/db-connection.php';
session_start();
$conn = connectDB();
$success = "";
if(isset($_SESSION['success']) && $success!="") {
    $success = $_SESSION['success'];
}

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

<div class="mb-4">
    <?php if ($success != ""):?>
        <div class="alert alert-success" onclick="hideMe()" id="message">
            <p class="success"><?php echo $success ?></p>
        </div>
    <?php endif;?>    
        <h5>Add New Category</h5>
        <form method="POST" action="../../jobSpark/admin/handlers/add-new-category.php">
            <div class="mb-3">
                <label for="category" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add to Categories</button>
        </form>
</div>

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

<?php unset($_SESSION['success']); ?>