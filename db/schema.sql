CREATE TABLE users (
    userId VARCHAR(255) PRIMARY KEY, 
    fullname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL, 
    linkedIn VARCHAR(255),
    role ENUM('admin', 'applicant', 'employer') NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    numberOfJobs INT NOT NULL DEFAULT 0
);

CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    postedBy VARCHAR(255) NOT NULL,
    category INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    companyName VARCHAR(255) NOT NULL,
    location varchar(255) NOT NULL,
    salaryRange VARCHAR(255),
    duration ENUM('part-time', 'full-time', 'contract', 'internship') NOT NULL,
    type ENUM('remote', 'onsite', 'hybrid') NOT NULL,
    datePosted DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    skills TEXT,
    status ENUM('active', 'closed') NOT NULL DEFAULT 'active',
    numberOfApplicants INT NOT NULL DEFAULT 0,
    description TEXT NOT NULL,
    requirements TEXT NOT NULL,
    department varchar(255) NOT NULL,
    experience ENUM('entry-level', 'mid-level', 'senior-level', 'expert-level') NOT NULL,
    FOREIGN KEY (postedBy) REFERENCES users(userId) ON DELETE CASCADE,
    FOREIGN KEY (category) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId varchar(255),
    review TEXT NOT NULL,
    name VARCHAR(255) NOT NULL,
    occupation VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(userId) ON DELETE SET NULL
);

CREATE TABLE applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId VARCHAR(255) NOT NULL,
    jobId INT NOT NULL,
    cv VARCHAR(255) NOT NULL,
    status ENUM('new', 'reviewed', 'shortlisted', 'rejected') NOT NULL DEFAULT 'new',
    experience INT NOT NULL DEFAULT 0,
    joiningDate DATE,
    coverLetter TEXT,
    FOREIGN KEY (userId) REFERENCES users(userId) ON DELETE CASCADE,
    FOREIGN KEY (jobId) REFERENCES jobs(id) ON DELETE CASCADE
);

CREATE TABLE featuredJobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jobId INT NOT NULL,
    FOREIGN KEY (jobId) REFERENCES jobs(id) ON DELETE CASCADE
);