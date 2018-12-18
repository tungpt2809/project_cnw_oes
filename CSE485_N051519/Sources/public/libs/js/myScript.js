var loginRequired = document.getElementsByClassName("login-required");

for(var i = 0; i < loginRequired.length; i++) (function(i){ 
    loginRequired[i].onclick = function() {
        alert("Bạn phải đăng nhập trước.");
    }  
})(i);

