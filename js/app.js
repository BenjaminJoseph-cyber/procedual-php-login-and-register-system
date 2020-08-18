const login_title = document.querySelector('.login-title')
const login_body = document.querySelector('.login-body')
const register_title = document.querySelector('.reg-title')
const register_body = document.querySelector('.register-body')

register_title.addEventListener('click', function () {

  register_title.classList.add('active')
  register_body.classList.remove('hide')
  register_body.classList.add('show')
  login_title.classList.remove('active')
  login_body.classList.add('hide')

})

login_title.addEventListener('click', function () {

  login_title.classList.add('active')
  login_body.classList.remove('hide')
  login_body.classList.add('show')
  register_title.classList.remove('active')
  register_body.classList.add('hide')

})