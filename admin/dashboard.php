<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit;
}

$name = $_SESSION['admin']['fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                JOB-SPARK Admin Dashboard
            </a>
            <span class="navbar-text text-white">Welcome, <strong><?php echo $name;?></strong></span>
            <a  class="btn btn-danger" href="./handlers/logout-admin.php">LOGOUT</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column" id="sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-section="job-list">Job List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="category-list">Category List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="featured-jobs">Featured Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="user-list">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="applicant-list">Applicant List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="add-admin">Add Admin</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10" id="main-content">
                <h2>Welcome to Admin Dashboard</h2>
                <p>Select an option from the sidebar to manage the portal.</p>
            </main>
        </div>
    </div>

    <script>
        const contentMap = {
            'job-list': 'Views/job-list.php',
            'category-list': 'Views/category-list.php',
            'featured-jobs': 'Views/featured-jobs.php',
            'user-list': 'Views/user-list.php',
            'applicant-list': 'Views/applicant-list.php',
            'add-admin': 'Views/add-admin.php'
        };

        const baseURL = `${window.location.origin}/jobSpark/admin/`;

        document.getElementById('sidebar-menu').addEventListener('click', (event) => {
            if (event.target.tagName === 'A') {
                event.preventDefault();

                // Remove 'active' class from all links
                document.querySelectorAll('#sidebar-menu .nav-link').forEach(link => link.classList.remove('active'));

                // Add 'active' class to the clicked link
                event.target.classList.add('active');

                // Get the section and mapped URL
                const section = event.target.getAttribute('data-section');
                if (contentMap[section]) {
                    const pageUrl = `${baseURL}${contentMap[section]}`;
                    
                    // Load content via fetch
                    fetch(pageUrl)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('main-content').innerHTML = html;

                            // Update browser URL
                            const newUrl = `${baseURL}dashboard.php?section=${section}`;
                            history.pushState({ section }, '', newUrl);
                        })
                        .catch(error => console.error('Error loading content:', error));
                }
            }
        });

        // Handle back/forward navigation
        window.addEventListener('popstate', (event) => {
            if (event.state && event.state.section) {
                const section = event.state.section;
                if (contentMap[section]) {
                    const pageUrl = `${baseURL}${contentMap[section]}`;
                    fetch(pageUrl)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('main-content').innerHTML = html;

                            // Update active link
                            document.querySelectorAll('#sidebar-menu .nav-link').forEach(link => link.classList.remove('active'));
                            document.querySelector(`[data-section="${section}"]`).classList.add('active');
                        })
                        .catch(error => console.error('Error handling popstate:', error));
                }
            }
        });

        // Load the initial section based on URL query
        const urlParams = new URLSearchParams(window.location.search);
        const initialSection = urlParams.get('section');
        if (initialSection && contentMap[initialSection]) {
            document.querySelector(`[data-section="${initialSection}"]`).click();
        }

         function hideMe() {
            const box = document.getElementById('message');
            box.style.display = 'none';
            console.log(box.style.display);
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
