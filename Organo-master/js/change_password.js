window.onload = () => {

    (function () {
        var btn = document.getElementById("REG_button")
        btn.disabled = true;
        var user = document.getElementById("username");
        var pass_1 = document.getElementById("password");
        var pass_2 = document.getElementById("con_password");
        var error = document.getElementById("error");
        var error2 = document.getElementById("error2");
        function check() {
            var cond1 = true, cond2 = true;
            if (user.value === "" || pass_1.value === "" || pass_2.value === "") {
                cond1 = false;
                error.innerHTML = "Fields cannot be left empty";

            }
            else {
                error.innerHTML = "";
            }
            if (pass_1.value !== pass_2.value) {
                cond2 = false;
                error2.innerHTML = "Passwords do not match";
            }
            else {
                if (pass_1.value.length < 8) {
                    error2.innerHTML = "Password must have atleast 8 characters";
                    cond2 = false;
                }
                else {
                    cond2 = true;
                }
            }

            if (cond1 === true && cond2 === true) {
                error.innerHTML="";
                error2.innerHTML="";
                btn.disabled = false;
            }
        }
        user.addEventListener("keyup", check);
        pass_1.addEventListener("keyup", check);
        pass_2.addEventListener("keyup", check);

    })();
}
