$("#signupform").submit(function(){
    let a = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    alert($("#username-signup").value);
});