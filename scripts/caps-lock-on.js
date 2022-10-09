//Js script to warn user if caps lock is on/
//Author - Jeremy Genovese
const password = document.querySelector('#password');
const message = document.querySelector('.warning');

password.addEventListener('keyup', function (e) {
    if (e.getModifierState('CapsLock')) {
        message.textContent = 'Caps lock is on';
    } else {
        message.textContent = '';
    }
});