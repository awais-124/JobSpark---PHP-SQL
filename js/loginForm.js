function formValidator(e) {
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const usernameRegex = /^[a-zA-Z_-]{5,}$/;
  const passwordRegex =
    /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+={}[\]|\\:;"'<>,.?/~`]).{8,}$/;

  if (!usernameRegex.test(username)) {
    alert(
      'Username must be at least 5 characters long and contain only letters, underscores (_), or dashes (-).'
    );
    e.preventDefault();
    return false;
  }
  if (!passwordRegex.test(password)) {
    alert(
      'Password must be at least 8 characters long and include an uppercase letter, a lowercase letter, a number, and a special character.'
    );
    e.preventDefault();
    return false;
  }
  return true;
}
