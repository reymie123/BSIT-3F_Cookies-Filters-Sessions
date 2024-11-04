//so the main purpose of this js code is that we can toggle between two forms on a webpage which is the sign-in button and the sign-up button.
//when the users clicks on the sign-in button the sign-up form is shown and the sign-in form is hidden.
const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})
