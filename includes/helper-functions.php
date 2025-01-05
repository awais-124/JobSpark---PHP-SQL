<?php
require_once "db-connection.php";

function fetchJobsByCategory($categoryId) {
    $conn = connectDB();
    $categoryId = mysqli_real_escape_string($conn, $categoryId);
    $sql = "SELECT id, title, companyName, location, salaryRange, type, duration, datePosted 
            FROM jobs WHERE category = $categoryId AND status = 'active'";
    $result = mysqli_query($conn, $sql);

    $jobs = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
    }

    mysqli_close($conn);
    return $jobs;
}

function fetchAllJobs() {
    $jobs = [];
    $conn = connectDB();
    $sql = "SELECT id, title, companyName, location, salaryRange, type, duration, datePosted 
            FROM jobs WHERE status = 'active'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
    }

    mysqli_close($conn);
    return $jobs;
}

// Fetch category name
function fetchCategoryName($categoryId) {
    $conn = connectDB();
    $categoryId = mysqli_real_escape_string($conn, $categoryId);
    $sql = "SELECT title FROM categories WHERE id = $categoryId";
    $result = mysqli_query($conn, $sql);

    $categoryName = '';
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $categoryName = $row['title'];
    }

    mysqli_close($conn);
    return $categoryName;
}


function generateJobMarkup($job) {
    return "
    <div class='job-item' data-job-id='{$job['id']}'>
        <h3 class='job-title'>{$job['title']}</h3>
        <p class='company-name'>Company: {$job['companyName']}</p>
        <p class='location'>Location: {$job['location']}</p>
        <p class='salary'>Salary: {$job['salaryRange']}</p>
        <p class='job-type'>Type: {$job['type']}</p>
        <p class='duration'>Duration: {$job['duration']}</p>
        <button class='view-details' onclick='openModal({$job['id']})'>View Details</button>
        <form action='../Pages/JobApplication.php?jobId={$job['id']}' method='post' style='display:inline;'>
            <input type='hidden' name='jobId' value='{$job['id']}'>
            <button type='submit' class='apply-button'>Apply Now</button>
        </form>
    </div>";
}

function getCategories($conn){
    $sql = "SELECT categories.id, categories.title, COUNT(jobs.id) as job_count
        FROM categories
        LEFT JOIN jobs ON categories.id = jobs.category
        GROUP BY categories.title";

    $result = $conn->query($sql);

    $categories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = [
                'id' => $row['id'],
                'name' => $row['title'],
                'job_count' => $row['job_count']
            ];
        }
        return $categories;
    } else {
        echo "No categories found.";
        return [];
    }
}

function getFeaturedJobs($conn) {
    $featuredJobs = [];
    $sql = "SELECT jobs.id, jobs.title, jobs.companyName, jobs.location, jobs.salaryRange, jobs.duration 
        FROM featuredJobs 
        JOIN jobs ON featuredJobs.jobId = jobs.id 
        WHERE jobs.status = 'active' 
        ORDER BY RAND() 
        LIMIT 6";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $featuredJobs[] = $row;
        }
        return $featuredJobs;
    } else {
        echo "No featured jobs found.";
        return [];
    }
}

function getRandomTestimonials($conn, $number) {
    $testimonials = array();
        $sql = "SELECT t.id, t.review, t.name, t.occupation, t.image 
            FROM testimonials t 
            ORDER BY RAND() 
            LIMIT $number";
            
    try {
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $testimonials[] = array(
                    'id' => $row['id'],
                    'review' => $row['review'],
                    'name' => $row['name'],
                    'occupation' => $row['occupation'],
                    'image' => $row['image']
                );
            }
        }
    } catch (Exception $e) {
        error_log("Error fetching testimonials: " . $e->getMessage());
        return [];
    }
    
    return $testimonials;
}


function fetchJobsByEmployer($userId)
{
    $conn = connectDB();
    $query = "SELECT * FROM jobs WHERE postedBy = '$userId'";
    $result = mysqli_query($conn, $query);
    $jobs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }
    return $jobs;
}

function fetchActiveJobsByEmployer($userId)
{
    $allJobs = fetchJobsByEmployer($userId);
    $activeJobs = array_filter($allJobs, function ($job) {
        return $job['status'] === 'active';
    });
    return $activeJobs;
}


function fetchApplicantsByUser($userId) {
    $conn = connectDB();
    $query = "SELECT 
                  a.id AS applicantId, 
                  a.cv, 
                  a.experience, 
                  a.coverLetter, 
                  u.fullName, 
                  j.title AS jobTitle
              FROM 
                  applicants a
              INNER JOIN 
                  users u ON a.userId = u.userId
              INNER JOIN 
                  jobs j ON a.jobId = j.id
              WHERE 
                  j.postedBy = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $applicants = [];
    while ($row = $result->fetch_assoc()) {
        $applicants[] = $row;
    }

    $stmt->close();
    return $applicants;
}

?>