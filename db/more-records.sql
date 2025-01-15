INSERT INTO users (userId, fullname, username, email, phone, password, linkedIn, role) VALUES
('6778eb34de4f0', 'Adeel Khan', 'adeelkhan', 'adeel.khan@gmail.com', '+92-300-1122334', 'Adeel@123', 'adeelkhan', 'applicant'),
('6778eb34de4f1', 'Sobia Tariq', 'sobiatariq', 'sobia.tariq@gmail.com', '+92-301-2233445', 'Sobia#456', 'sobiatariq', 'applicant'),
('6778eb34de4f2', 'Furqan Ali', 'furqanali', 'furqan.ali@gmail.com', '+92-302-3344556', 'Furqan@2023', 'furqanali', 'applicant'),
('6778eb34de4f3', 'Anam Zafar', 'anamzafar', 'anam.zafar@gmail.com', '+92-303-4455667', 'Anam#789', 'anamzafar', 'applicant'),
('6778eb34de4f4', 'Zeeshan Akhtar', 'zeeshanakhtar', 'zeeshan.akhtar@gmail.com', '+92-304-5566778', 'Zeeshan@456', 'zeeshanakhtar', 'applicant'),
('6778eb34de4f5', 'Hira Khan', 'hirakhan', 'hira.khan@gmail.com', '+92-305-6677889', 'Hira#123', 'hirakhan', 'applicant'),
('6778eb34de4f6', 'Usama Malik', 'usamamalik', 'usama.malik@gmail.com', '+92-306-7788990', 'Usama@2023', 'usamamalik', 'applicant'),
('6778eb34de4f7', 'Sana Sheikh', 'sanasheikh', 'sana.sheikh@gmail.com', '+92-307-8899001', 'Sana#Admin', 'sanasheikh', 'employer'),
('6778eb34de4f8', 'Ali Raza', 'aliraza', 'ali.raza@gmail.com', '+92-308-9911223', 'Ali@Admin', 'aliraza', 'employer'),
('6778eb34de4f9', 'Tayyaba Noor', 'tayyabanoor', 'tayyaba.noor@gmail.com', '+92-309-1022334', 'Tayyaba@456', 'tayyabanoor', 'employer'),
('6778eb34de4fa', 'Rizwan Javed', 'rizwanjaved', 'rizwan.javed@gmail.com', '+92-310-2133445', 'Rizwan#789', 'rizwanjaved', 'employer'),
('6778eb34de4fb', 'Komal Ahmed', 'komalahmed', 'komal.ahmed@gmail.com', '+92-311-3244556', 'Komal@123', 'komalahmed', 'employer'),
('6778eb34de4fc', 'Javed Iqbal', 'javediqbal', 'javed.iqbal@gmail.com', '+92-312-4355667', 'Javed@2023', 'javediqbal', 'employer'),
('6778eb34de4fd', 'Rabia Siddiqui', 'rabiasiddiqui', 'rabia.siddiqui@gmail.com', '+92-313-5466778', 'Rabia#456', 'rabiasiddiqui', 'admin'),
('6778eb34de4fe', 'Waqas Ahmed', 'waqasahmed', 'waqas.ahmed@gmail.com', '+92-314-6577889', 'Waqas@Admin', 'waqasahmed', 'admin');

INSERT INTO categories (title, numberOfJobs) VALUES
('Finance & Banking', 10),
('Hospitality & Tourism', 10),
('Media & Entertainment', 10),
('Logistics & Transportation', 10);

INSERT INTO jobs (postedBy, category, title, companyName, location, salaryRange, duration, type, skills, description, requirements, department, experience) VALUES
-- Category 1: Information Technology
('6778eb34de1f7', 1, 'Software Engineer', 'InnoTech Solutions', 'Karachi', 'PKR 90,000 - 140,000', 'full-time', 'onsite', 'Java, Python, Agile', 'Develop, test, and deploy software solutions.', 'Bachelors in Computer Science.', 'IT', 'mid-level'),
('6778eb34de1f7', 1, 'UI/UX Designer', 'Creative Labs', 'Lahore', 'PKR 70,000 - 110,000', 'full-time', 'remote', 'Adobe XD, Figma, Wireframing', 'Design user-friendly interfaces.', 'Diploma in Graphic Design.', 'IT', 'entry-level'),

-- Category 2: Government
('6778eb34de200', 2, 'Police Officer', 'Punjab Police', 'Lahore', 'PKR 60,000 - 90,000', 'full-time', 'onsite', 'Law Enforcement, Communication', 'Maintain law and order.', 'Intermediate.', 'Government', 'entry-level'),
('6778eb34de200', 2, 'Customs Officer', 'Pakistan Customs', 'Karachi', 'PKR 70,000 - 110,000', 'full-time', 'onsite', 'Inspection, Report Writing', 'Inspect and monitor goods at ports.', 'Bachelors degree.', 'Government', 'mid-level'),

-- Category 3: Engineering
('6778eb34de203', 3, 'Project Engineer', 'SmartBuild Ltd.', 'Islamabad', 'PKR 100,000 - 150,000', 'contract', 'onsite', 'Project Management, MS Project', 'Oversee engineering projects.', 'Bachelors in Engineering.', 'Engineering', 'mid-level'),
('6778eb34de203', 3, 'Architect', 'UrbanDesigners', 'Lahore', 'PKR 80,000 - 120,000', 'full-time', 'onsite', 'AutoCAD, Revit, Sketching', 'Design architectural projects.', 'Degree in Architecture.', 'Engineering', 'mid-level'),

-- Category 4: Healthcare
('6778eb34de210', 4, 'Medical Technologist', 'LifeCare Hospital', 'Faisalabad', 'PKR 50,000 - 80,000', 'full-time', 'onsite', 'Lab Testing, Microbiology', 'Perform diagnostic tests.', 'Diploma in Lab Technology.', 'Healthcare', 'entry-level'),
('6778eb34de210', 4, 'Anesthesiologist', 'HealthCare Plus', 'Rawalpindi', 'PKR 200,000 - 300,000', 'full-time', 'onsite', 'Anesthesia, Patient Monitoring', 'Administer anesthesia during surgeries.', 'MBBS with specialization.', 'Healthcare', 'senior-level'),

-- Category 5: Education
('6778eb34de216', 5, 'Curriculum Developer', 'EduBuilders', 'Lahore', 'PKR 90,000 - 130,000', 'full-time', 'remote', 'Curriculum Design, Research', 'Develop effective curriculums.', 'Masters in Education.', 'Education', 'mid-level'),
('6778eb34de216', 5, 'Tutor', 'LearnFast', 'Karachi', 'PKR 40,000 - 70,000', 'part-time', 'remote', 'Subject Knowledge, Patience', 'Assist students in studies.', 'Bachelors in relevant field.', 'Education', 'entry-level'),

-- Category 6: Marketing
('6778eb34de220', 6, 'Marketing Analyst', 'MarketScope', 'Islamabad', 'PKR 70,000 - 100,000', 'full-time', 'onsite', 'Market Analysis, Reporting', 'Analyze marketing trends.', 'Bachelors in Marketing.', 'Marketing', 'mid-level'),
('6778eb34de220', 6, 'Public Relations Manager', 'BrandPulse', 'Lahore', 'PKR 90,000 - 130,000', 'full-time', 'onsite', 'PR Strategy, Media Relations', 'Manage public relations campaigns.', 'MBA in Marketing.', 'Marketing', 'senior-level'),

-- Additional jobs across categories
('6778eb34de210', 4, 'Veterinary Doctor', 'AnimalCare', 'Multan', 'PKR 80,000 - 120,000', 'full-time', 'onsite', 'Animal Care, Surgery', 'Provide healthcare for animals.', 'DVM degree.', 'Healthcare', 'mid-level'),
('6778eb34de216', 5, 'School Principal', 'Scholars Academy', 'Karachi', 'PKR 150,000 - 200,000', 'full-time', 'onsite', 'Leadership, Policy Making', 'Lead the school operations.', 'Masters in Education.', 'Education', 'senior-level'),
('6778eb34de1f7', 1, 'Machine Learning Engineer', 'AI Innovators', 'Islamabad', 'PKR 150,000 - 220,000', 'full-time', 'remote', 'ML, Python, Data Analysis', 'Develop machine learning models.', 'Masters in Data Science.', 'IT', 'expert-level'),
('6778eb34de200', 2, 'Environmental Officer', 'Ministry of Environment', 'Quetta', 'PKR 70,000 - 100,000', 'full-time', 'onsite', 'Environmental Law, Policy Development', 'Monitor and regulate environmental standards.', 'Bachelors in Environmental Science.', 'Government', 'mid-level'),
('6778eb34de203', 3, 'Electrical Technician', 'PowerGrid', 'Lahore', 'PKR 50,000 - 75,000', 'full-time', 'onsite', 'Electrical Maintenance, Troubleshooting', 'Repair and maintain electrical systems.', 'Diploma in Electrical Technology.', 'Engineering', 'entry-level'),
('6778eb34de220', 6, 'E-commerce Specialist', 'ShopEase', 'Karachi', 'PKR 60,000 - 90,000', 'full-time', 'remote', 'Shopify, Digital Marketing', 'Manage e-commerce operations.', 'Bachelors in Business Administration.', 'Marketing', 'mid-level');


INSERT INTO featuredJobs (jobId) VALUES
(11), (15), (22), (38), (54), (72), (43), (57), (13), (67);


INSERT INTO testimonials (userId, review, name, occupation, image) VALUES
('6778eb34de4f0', 'JobSpark is an amazing platform! It helped me find the perfect job in no time.', 'Laiba Khan', 'Web Developer', 'ali_khan.jpg'),
('6778eb34de4f1', 'The user-friendly interface and job alerts are fantastic. Highly recommend JobSpark!', 'Kamran Farooq', 'Mechanical Engineer', 'sara_ahmed.jpg'),
('6778eb34de4f2', 'Thanks to JobSpark, I was able to switch to a better career opportunity.', 'Adeel Aslam', 'Content Writer', 'hassan_raza.jpg'),
('6778eb34de4f3', 'JobSpark provides such a seamless hiring experience. Love using it!', 'Rabia Amir', 'HR Executive', 'ayesha_malik.jpg'),
('6778eb34de4f4', 'I trust JobSpark for all my hiring needs. The quality of candidates is excellent.', 'Taimoor Jalal', 'Team Lead', 'usman_tariq.jpg'),
('6778eb34de4f5', 'Finding jobs that match my skills has never been this easy. Thank you, JobSpark!', 'Sarah Bashir', 'Business Analyst', 'nida_qureshi.jpg'),
('6778eb34de1ee', 'JobSpark has revolutionized the way I approach job applications. It’s incredibly efficient.', 'Hassan Mirza', 'Project Manager', 'bilal_zafar.jpg'),
('6778eb34de1f0', 'Posting jobs and managing applications is a breeze on JobSpark. It saves me so much time.', 'Fatima Shah', 'HR Specialist', 'maham_shah.jpg'),
('6778eb34de203', 'I love the personalized job recommendations. They’ve been a game-changer for me!', 'Zara Habib', 'UI/UX Designer', 'fahad_hussain.jpg'),
('6778eb34de1ea', 'JobSparks resources and tools have been a lifesaver during my job hunt.', 'Owais Siddiqui', 'Freelancer', 'amna_javed.jpg'),
('6778eb34de216', 'The employer dashboard is intuitive and feature-rich. It’s perfect for small businesses.', 'Ali Riaz', 'Startup Founder', 'ali_khan.jpg'),
('6778eb34de1be', 'JobSpark helped me secure a remote position that perfectly fits my lifestyle.', 'Uzair Iqbal', 'Digital Marketer', 'sara_ahmed.jpg'),
('6778eb34de1e3', 'The job alerts feature is spot-on and saves so much time.', 'Mariam Hassan', 'SEO Specialist', 'hassan_raza.jpg'),
('6778eb34de1e8', 'JobSpark truly bridges the gap between employers and job seekers.', 'Jawad Ahmed', 'Financial Analyst', 'ayesha_malik.jpg'),
('6778eb34de215', 'I have recommended JobSpark to all my colleagues. It’s a top-notch platform!', 'Hina Nauman', 'IT Consultant', 'usman_tariq.jpg'),
('6778eb34de225', 'Thanks to JobSpark, my company has successfully onboarded talented employees.', 'Rizwan Akhtar', 'Director of Operations', 'nida_qureshi.jpg'),
('6778eb34de235', 'JobSpark ensures a hassle-free application process. It’s very professional.', 'Laiba Muneeb', 'Interior Designer', 'bilal_zafar.jpg'),
('6778eb34de210', 'The AI-based job suggestions are incredibly accurate. JobSpark knows what I’m looking for.', 'Nashit Alam', 'Network Engineer', 'maham_shah.jpg'),
('6778eb34de1f7', 'I landed my dream job within weeks of using JobSpark. Highly recommended!', 'Samina Kamran', 'Teacher', 'fahad_hussain.jpg'),
('6778eb34de203', 'JobSpark is the ultimate job portal. It caters to both job seekers and employers alike.', 'Shahzaib Khan', 'Supply Chain Manager', 'amna_javed.jpg');


INSERT INTO applicants (userId, jobId, cv, status, experience, joiningDate, coverLetter) VALUES
('6778eb34de450', 20, 'Hassan_Mirza.pdf', 'new', 3, NULL, 'I am passionate about this opportunity.'),
('6778eb34de451', 15, 'Sadia_Anwar.pdf', 'reviewed', 4, NULL, 'Looking forward to contributing innovative ideas.'),
('6778eb34de452', 10, 'Aliya_Nawaz.pdf', 'shortlisted', 5, '2025-01-30', 'I bring extensive experience to this role.'),
('6778eb34de453', 27, 'Kamran_Farooq.pdf', 'new', 2, NULL, 'Eager to learn and grow with your team.'),
('6778eb34de454', 5, 'Nashit_Alam.pdf', 'rejected', 6, NULL, 'Committed to exceeding expectations in this role.'),
('6778eb34de455', 42, 'Sarah_Bashir.pdf', 'shortlisted', 3, '2025-02-18', 'Excited to bring my skills to your team.'),
('6778eb34de456', 35, 'Taimoor_Jalal.pdf', 'reviewed', 7, NULL, 'Dedicated to delivering impactful work.'),
('6778eb34de457', 38, 'Hamza_Shafiq.pdf', 'new', 1, NULL, 'Motivated to excel in this role.'),
('6778eb34de458', 30, 'Zara_Habib.pdf', 'shortlisted', 5, '2025-03-01', 'I bring a unique perspective to this role.'),
('6778eb34de459', 12, 'Adeel_Aslam.pdf', 'new', 4, NULL, 'I am driven to achieve outstanding results.'),
('6778eb34de460', 8, 'Irfan_Shahzad.pdf', 'reviewed', 2, NULL, 'Excited to start a rewarding career here.'),
('6778eb34de461', 19, 'Shahzaib_Khan.pdf', 'new', 6, NULL, 'Looking forward to impactful contributions.'),
('6778eb34de462', 22, 'Rabia_Amir.pdf', 'shortlisted', 7, '2025-03-15', 'Passionate about creating value.'),
('6778eb34de463', 55, 'Musa_Fayyaz.pdf', 'new', 3, NULL, 'I am ready to take on challenges in this role.'),
('6778eb34de464', 17, 'Laiba_Muneeb.pdf', 'reviewed', 2, NULL, 'Motivated to grow with your team.'),
('6778eb34de465', 33, 'Rizwan_Akhtar.pdf', 'new', 5, NULL, 'Looking forward to contributing my skills.'),
('6778eb34de466', 47, 'Hina_Nauman.pdf', 'shortlisted', 4, '2025-02-05', 'I aim to deliver impactful results.'),
('6778eb34de467', 9, 'Ali_Riaz.pdf', 'rejected', 6, NULL, 'Committed to delivering excellence.'),
('6778eb34de468', 13, 'Kiran_Faheem.pdf', 'reviewed', 5, NULL, 'Excited to bring my expertise to your team.'),
('6778eb34de469', 41, 'Uzair_Iqbal.pdf', 'new', 1, NULL, 'Ready to make meaningful contributions.'),
('6778eb34de470', 36, 'Zain_Malik.pdf', 'shortlisted', 3, '2025-01-25', 'I bring a fresh perspective to this role.'),
('6778eb34de471', 26, 'Samina_Kamran.pdf', 'reviewed', 7, NULL, 'Motivated to deliver exceptional results.'),
('6778eb34de472', 14, 'Amir_Salman.pdf', 'new', 2, NULL, 'Looking forward to learning and growing.'),
('6778eb34de473', 28, 'Fatima_Shah.pdf', 'shortlisted', 6, '2025-02-28', 'I am ready to take on new challenges.'),
('6778eb34de474', 31, 'Haris_Raza.pdf', 'new', 4, NULL, 'Excited to contribute to your goals.'),
('6778eb34de475', 18, 'Mariam_Hassan.pdf', 'reviewed', 3, NULL, 'Dedicated to achieving excellence.'),
('6778eb34de476', 60, 'Jawad_Ahmed.pdf', 'new', 5, NULL, 'Committed to delivering impactful work.'),
('6778eb34de477', 21, 'Saba_Naeem.pdf', 'shortlisted', 2, '2025-03-20', 'Excited to leverage my skills in this role.'),
('6778eb34de478', 43, 'Osama_Javed.pdf', 'rejected', 6, NULL, 'Looking forward to growing in this role.'),
('6778eb34de479', 37, 'Ayesha_Basit.pdf', 'reviewed', 4, NULL, 'I am passionate about delivering results.');
