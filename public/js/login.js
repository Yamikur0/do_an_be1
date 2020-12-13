$('document').ready(function () {
    let username_state = false;
    let password_state = false;
    let confirm_state = true;
    $('#username-signup').on('blur', function () {
        let username = $('#username-signup').val();
        console.table(username);
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            type: "post",
            url: "/do_an_be1/login/process.php",
            data: {
                'username_check': 1,
                'username': username
            },
            success: function (response) {
                if (response == 'taken') {
                    username_state = false;
                    $('#signupalert').show();
                    $('#signupalert').find('span').text('Username đã được sử dụng');
                } else if (response == 'not_taken') {
                    username_state = true;
                    $('#signupalert').hide();
                }
            }
        });
    });

    $('#passwd-signup').on('blur', function () {
        let password = $('#passwd-signup').val();
        if (password == '') {
            password_state = false;
            return;
        }
        let regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!regex.test(password)) {
            password_state = false;
            $('#signupalert').show();
            $('#signupalert').find('span').text('Password sai quy định');
        }else{
            password_state= true;
            $('#signupalert').hide();
        }
    });

    $('#passwd-confirm').on('blur', function () {
        let confirm = $('#passwd-confirm').val();
        let password = $('#passwd-signup').val();
        if (confirm == '') {
            confirm_state = false;
            return;
        }
        if (!(confirm == password)) {
            confirm_state = false;
            $('#signupalert').show();
            $('#signupalert').find('span').text('Password không trùng nhau');
        }else{
            confirm_state = true;
            $('#signupalert').hide();
        }
    });

    $('#btn-signup').on('click', function () {
        let username = $('#username-signup').val();
        let password = $('#passwd-signup').val();
        if (username == ''||password=='') {
            username_state = true;
            password_state = true;
            confirm_state = true;
        }
        if (username_state==false||password_state==false||confirm_state==false) {
            $('#signupalert').show();
            $('#signupalert').find('span').text('Vui lòng sữa lỗi trong biểu mẫu');
        }else{
            $.ajax({
				url: '/do_an_be1/login/process.php',
				type: 'post',
				data: {
					'save': 1,
					'username': username,
                    'password': password
				},
				success: function (response) {
					alert('user saved');
					$('#username-signup').val('');
					$('#passwd-signup').val('');
					$('#passwd-confirm').val('');
				}
			});
        }
    });
});