I want you to write SQL code to create db schema in MySql db in PHPmyAdmin.
Below are the details of all tables:
```
# users: (userId(a unique id, will be provided by php code), fullname(varchar), username(varchar - (minimum 6 digits)), email(email), phone(varchar) password(varchar - (will be hash-value)), confirmPassword(same as password), linkedIn(username (optional)), role['admin', 'applicant', 'employer'])

# categories: (id(auto-increment), title(varchar), (numberOfJobs(integer))) 

# featuredJobs: (id(auto-increment), jobId(Foreign-Key to jobs table[no null]))

# jobs: (id(auto-increment), postedBy(ForeignKey to Users Table of role='employer'), title(varchar), companyName(varchar), location(cities of Pakistan), salaryRange(), duration['part-time', 'full-time', 'contract', 'internship'], type['remote', 'onsite', 'hybrid'], datePosted(date-time), skills[a list of skills], status['active', 'closed'], numberOfApplicants[integer], description(varchar), requirements(varchar), department('IT', 'Design' ,'Marketing', 'Sales', 'Goverment', 'Other'), experience('entry-level', 'mid-level', 'senior-level', 'expert'))

# testimonials: (id(auto-increment), review(varchar), name(fullname), occupation(e.g. 'Manager at HBL'), image(will be image name/id))

# applicants: (id(auto-increment), userId(ForeignKey to users Table), jobId(ForeignKey to jobs TABLE), cv(filename), status['new', 'reviewed', 'shortlisted', 'rejected'], experience[integer], joiningDate(date), coverLetter(TEXT))
```

For Now just give code for these tables. Also add necessary constraints like not-null etc. 

ALSO,
Give some code which can be used to create ER Diagram of above schema on some website(platform), if any?