<form action="../controllers/post-job.php" method="POST">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Job Title</label> 
            <input type="text" name="job-title" class="form-control" placeholder="e.g. Senior React Developer" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Department</label>
            <select class="form-select" name="department" required>
            <option value="IT & Software">IT & Software</option>
            <option value="Design">Design</option>
            <option value="Marketing">Marketing</option>
            <option value="Sales">Sales</option>
            <option value="Finance">Finance</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Education">Education</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Engineering">Engineering</option>
            <option value="Customer Service">Customer Service</option>
            <option value="Legal">Legal</option>
            <option value="Operations">Operations</option>
            <option value="Supply Chain">Supply Chain</option>
            <option value="Research & Development">Research & Development</option>
            <option value="Media & Communication">Media & Communication</option>
            <option value="Administration">Administration</option>
            <option value="Other">Other</option>
        </select>

        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Job Type</label>
            <select class="form-select" name="duration" required>
                <option value="full-time">Full Time</option>
                <option value="part-time">Part Time</option>
                <option value="contract">Contract</option>
                <option value="internship">Internship</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Experience Level</label>
            <select class="form-select" name="level" required>
                <option value="entry-level">Entry Level</option>
                <option value="mid-level">Mid Level</option>
                <option value="senior-level">Senior Level</option>
                <option value="expert-level">Expert</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Salary Range</label>
            <div class="input-group">
                <input type="number" name="min-salary" class="form-control" placeholder="Min" min="0" required >
                <span class="input-group-text">to</span>
                <input type="number" name="max-salary" class="form-control" placeholder="Max" min="0" required >
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="e.g. Islamabad, Pakistan" required>
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Required Skills</label>
            <input type="text" name="skills" class="form-control" placeholder="e.g. React, Node.js, MongoDB" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category" required>
                <option value="1">Information Technology</option>
                <option value="2">Armed Forces</option>
                <option value="3">Engineering</option>
                <option value="4">Healthcare</option>
                <option value="5">Education</option>
                <option value="6">Sales & Marketing</option>
                <option value="7">Telecommunications</option>
                <option value="8">Government</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Company</label> 
            <input type="text" name="company" class="form-control" placeholder="e.g. Systems Limited" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Type</label>
            <select class="form-select" name="type" required>
                <option value="onsite">On Site</option>
                <option value="remote">Remote</option>
                <option value="hybrid">Hybrid</option>
            </select>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Job Description</label>
            <textarea class="form-control" name="description" rows="4" placeholder="Enter detailed job description" required></textarea>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Requirements</label>
            <textarea class="form-control" name="requirements" rows="4" placeholder="Enter job requirements" required></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-custom-primary">Post Job</button>
        </div>
    </div>
</form>