const name = document.getElementById('name')
const email = document.getElementById('email')
const password = document.getElementById('password')
const confirm_password = document.getElementById('confirm_password')
const phoneNumber = document.getElementById('phoneNumber')
const address = document.getElementById('address')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

  form.addEventListener('submit', (e) => {
    let messages = []
    if (name.value === '' || name.value == null) {
      messages.push('Name is required')
    }

    if(confirm_password.value != password.value) {
        messages.push('Passwords do not match. Please try again')
      }

    if (messages.length > 0) {
      e.preventDefault()
      errorElement.innerText = messages.join(', ')
    }
  })