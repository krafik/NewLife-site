'use strict';

let form = $('#formContact');
let inputs = document.querySelectorAll('input');

let inpName = document.querySelector('input#callrequest-name');
let inpCity = document.querySelector('input#callrequest-town');
let inpNumber = document.querySelector('input#callrequest-number');
let inpEmail = document.querySelector('input#callrequest-email');

let btnForm = document.querySelector('button.btnForm');
let checkbox = document.querySelector('#callrequest-agreement');
btnForm.setAttribute('disabled', 'disabled');
// console.log(inpName);
$('#modalContent').on('click', '.box__btn, .box__close', function (e) {
    e.preventDefault();
    $(this).parents('.popupWrap').fadeOut(300, function () {
        $(this).remove();
        $('body').removeClass('lock');
    })
});

$('.btnForm').on('click', function (e) {
    e.preventDefault();
    let data = form.serializeArray();
    $.ajax({
        url: '/',
        type: 'POST',
        // dataType:'json',
        data: data,

        success: function (res) {
            $('.form__input').val('');
            $('body').addClass('lock');
            $('#modalContent').html(res);
            $('#modalContent .popupWrap').fadeIn(300);
            document.getElementById('callrequest-agreement').checked = false;
            btnForm.setAttribute('disabled', 'disabled');
        },
        error: function () {
            alert('Error!');
        }
    })

});

// $(".number").inputmask({"mask": "+7(999) 999-9999"});

inpNumber.addEventListener('keypress', (e) => {
    if(!/\d/.test(e.key)  ){
        e.preventDefault();
        console.log('yep');
    }
});



for (let i = 0; i < inputs.length; i++) {

    /*if (inputs[i].getAttribute('name') == 'Callrequest[number]') {
     inputs[i].addEventListener('keypress', (e) => {
     if (!/\d/.test(e.key) || !/[^+]/.test(e.key)) {
     console.log('yep');
     e.preventDefault();
     }
     if(!/\d/.test(e.key)  ){
     e.preventDefault();
     console.log('yep');
     }
     if (/^[+]/.test(e.key)){
     console.log('done');
     }


     });
     }*/

    if (inputs[i].getAttribute('name') == 'Callrequest[name]') {
        inputs[i].addEventListener('keypress', (e) => {
            if (!/[а-яА-Я]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }
    if (inputs[i].getAttribute('name') == 'Callrequest[town]') {
        inputs[i].addEventListener('keypress', (e) => {
            if (!/[а-яА-Я]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

}
checkbox.addEventListener('click', function () {
    if (this.hasAttribute('checked')) {
        this.removeAttribute('checked')
    } else {
        this.setAttribute('checked', 'checked');
    }

    if (inpName.value != '' && inpCity.value != '' && inpNumber.value != '' && inpEmail != '' && this.hasAttribute('checked')) {
        btnForm.removeAttribute('disabled');
    } else {
        btnForm.setAttribute('disabled', 'disabled');
    }
});
// function isEmpty(some) {
//     if
// }

// $(checkbox).on('click', function () {
//
//
//  console.log($(inputs).attr('id', 'callrequest-name' ));
// });

// form.on('change', function () {
//     for (let i = 0; i < inputs.length; i++) {
//         if (inputs[i].getAttribute('aria-invalid') == 'false' ){
//             btnForm.removeAttribute('disabled');
//         }else {
//             btnForm.setAttribute('disabled','disabled');
//         }
//     }
// });
