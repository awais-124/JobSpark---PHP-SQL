# **JOB-SPARK - A Job Portal**

JobSpark is a PHP and MySQL-based web application designed to connect job seekers and employers in an intuitive and seamless way.

![HOME PAGE](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/home.jpg)

---

![JOBS LIST](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/jobs.jpg)

---

![LOGIN](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/login.jpg)

---

![REGISTER](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/register.jpg)

---

![EMPLOYER MODULE](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/employer-main.jpg)

---

![ACTIVE JOBS](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/emp-active-jobs.jpg)

---

![ADMIN](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/admin.jpg)

---

![ADD ADMIN](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/add-admin.jpg)

---

![ADD JOB CATEGORY](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/category-admin.jpg)

---

![ABOUT PAGE](https://github.com/awais-124/JobSpark---PHP-SQL/blob/main/screenshots/about.jpg)

---


## **Folder Structure**

The project is organized into the following directories:
```txt
E:.
├───admin
│   ├───handlers
│   ├───styles
│   └───Views
├───assets
│   ├───icons
│   ├───images
│   └───logos
├───components
├───controllers
├───db
├───includes
├───js
├───Pages
├───styles
│   ├───AboutUsPage
│   ├───EmployerPage
│   ├───HomePage
│   ├───JobApplication
│   ├───JobsListingPage
│   ├───LoginPage
│   └───RegisterPage
└───uploaded-files
```


### **Folder Details**

#### **1. admin/**
Contains files and assets for admin functionalities.
- **handlers/**: PHP scripts for handling admin-specific requests like login/logout, CRUD operations, etc.
- **styles/**: CSS files specific to the admin panel.
- **Views/**: HTML and PHP files for the admin interface (e.g., dashboard, featured jobs).

#### **2. assets/**
Holds static assets used across the application.
- **icons/**: Icons used in the UI (e.g., search icon).
- **images/**: General images used throughout the platform.
- **logos/**: Logos for branding purposes.

#### **3. components/**
Reusable components like navigation bars, footers, and modals. These are included dynamically in various pages for consistency.

#### **4. controllers/**
Contains backend logic and functions to manage various application features (e.g., job listing, applications, user management).

#### **5. db/**
Database migration and schema files, including scripts for creating tables, populating seed data, and backups.

#### **6. includes/**
Shared utility files, such as database connection scripts, helper functions, and configurations used across the platform.

#### **7. js/**
JavaScript files for adding interactivity and client-side validation to the application.

#### **8. Pages/**
Frontend files for different pages like the home page, job listings, about us, and more. These files are dynamically populated using PHP and data from the database.

#### **9. styles/**
CSS files organized by page or feature.
- **AboutUsPage/**: Styles specific to the "About Us" page.
- **EmployerPage/**: Employer-related styles.
- **HomePage/**: Styles for the home/landing page.
- **JobApplication/**: Styles for job application forms.
- **JobsListingPage/**: Styles for job listing and search results.
- **LoginPage/**: Login form-specific styles.
- **RegisterPage/**: Registration form-specific styles.

#### **10. uploaded-files/**
Directory for storing user-uploaded files like resumes, profile pictures, and job descriptions.

---

## **Get Started**

1. Clone the repository:
   ```bash
   git clone https://github.com/awais-124/JobSpark---PHP-SQL.git
2. Create a database named `jobSpark_db` in Xampp
3. Import db files to create tables and add dummy data from `./db`.
