function onFirstForm () {
  $('#second').hide()

}

function onSecondForm () {
  $('#first').hide()
}

function funcBeforeFirst () {
}

function funcSuccessFirst (data) {
  if (data == 'true') {
    $('#first').hide(500)
    $('#second').show(500)
  }
  else {
    alert(
      'Some error with saving your data. Please check the entering data and try again.')
  }
}

function funcBeforeSecond () {
}

function funcSuccessSecond (data) {
  if (data == 'true') {
    $('#second').hide(500)
    $('#icons').show(500)
  }
  else {
    alert(
      'Some error with saving your data. Please check the entering data and try again.')
  }
}

$.validator.addMethod('filesize', function (value, element, param) {
  return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}')

$(function () {
  $.validator.setDefaults({
    highlight: function (element) {
      $(element).closest('.form-control').addClass('is-invalid')
    },
    unhighlight: function (element) {
      $(element).closest('.form-control').removeClass('is-invalid')
    },
  })

  $('#first').validate({
    rules: {
      firstname: {
        required: true,
      },
      lastname: 'required',
      birthdate: 'required',
      rep_subj: 'required',
      country_id: 'required',
      phone: 'required',
      email: {
        required: true,
        email: true,
        remote: {
          url: '/checkEmail',
          type: 'post',
        },
      },
    },
    messages: {
      email: {
        email: 'Please enter a <em>valid</em> email address',
        remote: 'This email is already registered.',
      },
    },
    submitHandler: function () {
      $.ajax({
        url: '/saveData',
        type: 'POST',
        data: ({
          firstname: $('#firstname').val(),
          lastname: $('#lastname').val(),
          birthdate: $('#birthdate').val(),
          rep_subj: $('#rep_subj').val(),
          country_id: $('#country_id').val(),
          phone: $('#phone').val(),
          email: $('#email').val(),
        }),
        datatype: 'html',
        beforeSend: funcBeforeFirst,
        success: funcSuccessFirst,
      })

    },
  })

  $('#second').validate({
    rules: {
      photo: {
        extension: 'png|jpe?g|gif',
        filesize: 5242880,
      },
    },
    messages: {
      photo: {
        extension: 'Only .png, .jpg, .jpeg, .gif files allowed.',
        filesize: 'File must be less then 5 Mb.',
      },
    },
    submitHandler: function () {




      $.ajax({
        url: '/showIcons',
        type: 'POST',
        data: ({
          company: $('#company').val(),
          position: $('#position').val(),
          about: $('#about').val(),
          photo: $('#photo').val()
        }),
        enctype: 'multipart/form-data',
        datatype: 'html',
        beforeSend: funcBeforeSecond,
        success: funcSuccessSecond,
      })
    },
  })

})



function getCookie (name) {
  let matches = document.cookie.match(new RegExp(
    '(?:^|; )' + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') +
    '=([^;]*)',
  ))
  return matches ? decodeURIComponent(matches[1]) : undefined
}

$(document).ready(function () {
  $(function () {
    $('#birthdate').datepicker()
  })

  if (getCookie('email') == undefined) {
    onFirstForm()
  }
  else {
    onSecondForm()
  }

  $('#icons').hide()
})

