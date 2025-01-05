function validateForm(event) {
  event.preventDefault();

  const firstName = document.getElementById('firstName').value.trim();
  const lastName = document.getElementById('lastName').value.trim();
  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();
  const confirmPassword = document
    .getElementById('confirmPassword')
    .value.trim();
  const linkedIn = document.getElementById('linkedIn').value.trim();

  let isValid = true;
  let errorMessage = '';

  if (!firstName || !lastName || !username || !password || !confirmPassword) {
    isValid = false;
    errorMessage += 'All fields are required.\n';
  }

  if (!isValidUsername(username)) {
    isValid = false;
    errorMessage +=
      'Username can only contain letters, hyphens (-), and underscores (_).\n';
  }

  if (!isValidPassword(password)) {
    isValid = false;
    errorMessage +=
      'Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long.\n';
  }

  if (password !== confirmPassword) {
    isValid = false;
    errorMessage += 'Passwords do not match.\n';
  }

  const linkedInPrefix = 'https://www.linkedin.com/in/';
  if (linkedIn && !linkedIn.startsWith(linkedInPrefix)) {
    isValid = false;
    errorMessage += 'LinkedIn URL must be a valid LinkedIn profile URL.\n';
  }

  if (!isValid) {
    alert(errorMessage);
  } else {
    alert('Form submitted successfully!');
    window.location.href = './LoginPage.html';
    return true;
  }
  return true;
}

function isValidUsername(username) {
  for (let i = 0; i < username.length; i++) {
    const char = username[i];
    if (
      !(
        (char >= 'a' && char <= 'z') ||
        (char >= 'A' && char <= 'Z') ||
        char === '-' ||
        char === '_'
      )
    ) {
      return false;
    }
  }
  return true;
}

function isValidPassword(password) {
  let hasLower = false,
    hasUpper = false,
    hasDigit = false,
    hasSpecialChar = false;

  for (let i = 0; i < password.length; i++) {
    const char = password[i];
    if (char >= 'a' && char <= 'z') hasLower = true;
    if (char >= 'A' && char <= 'Z') hasUpper = true;
    if (char >= '0' && char <= '9') hasDigit = true;
    if ('!@#$%^&*()_+={}[]|\\:;"\'<>,.?/~`'.includes(char))
      hasSpecialChar = true;
  }

  return (
    password.length >= 8 && hasLower && hasUpper && hasDigit && hasSpecialChar
  );
}
