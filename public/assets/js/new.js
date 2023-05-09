// Đăng ký Ajax
$(document).ready(function(){
    $("#register-form").submit(function(e){
        e.preventDefault();

        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();

        // var formData = new FormData();
        // formData.append('name', name);
        // formData.append('email', email);
        // formData.append('password', password);
        // console.log(name);

        $.ajax({
            url: 'api/register',
            type: 'POST',
            data: {
                name: name,
                email: email,
                password: password,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
            },

            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    })
})



$(".btn_google").click(function() {
    var curentLink = window.location;
    window.location.href = curentLink + '/' + 'auth/google';
});


var checkInput = document.querySelector('.checkInput');
checkInput.addEventListener('input', function(){
    checkInput.value = checkInput.value.replace(/[^a-zA-Z0-9]/g, '');
});

function space(params) {
    params.value = params.value.replace(/ /g, '');
}
