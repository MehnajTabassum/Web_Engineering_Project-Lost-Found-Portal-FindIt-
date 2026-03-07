//SHOW REGISTRATION FORM 
function registration() {
    document.getElementById("form2").style.display = "block";
    document.getElementById("form1").style.display = "none";
    document.getElementById("convention").innerHTML = `<p id="convention">already have an account?<a href="#" onclick="login()">Log in</a></p>`;
}

//SHOW LOGIN FORM 
function login() {
    document.getElementById("form1").style.display = "block";
    document.getElementById("form2").style.display = "none";
    document.getElementById("convention").innerHTML = `<p id="convention">don't have an account?<a href="#" onclick="registration()">Register</a></p>`;
}

//LOGIN VALIDATION
function validation() {
    let uname = document.getElementById("uname").value.trim();
    let pass = document.getElementById("loginPass").value.trim();

    if (uname.length < 3) {
        alert("Username must be minimum 3 characters!");
        return false;
    }

    if (pass.length < 6) {
        alert("Password must be at least 6 characters!");
        return false;
    }

    alert("Login Successful!");
    return true;
}

// PASSWORD LIVE VALIDATION 
document.getElementById("regPass").addEventListener("input", ()=> {
    let val = document.getElementById("regPass").value;
    let eCA = document.getElementById("eCA");
    let eSA = document.getElementById("eSA");
    let eD = document.getElementById("eD");
    let eSC = document.getElementById("eSC");

    let ca = 0, sa = 0, d = 0, sc = 0;

    for(let i = 0; i < val.length; i++){
        if(val[i] >= 'A' && val[i] <= 'Z'){
            ca = 1;
        } else if(val[i] >= 'a' && val[i] <= 'z'){
            sa = 1;
        } else if(val[i] >= '0' && val[i] <= '9'){
            d = 1;
        } else if(val[i] == ' '){
            continue;
        } else{
            sc = 1;
        }
    }

    if(ca == 1){
        eCA.innerHTML = "<br>✔️Capital Alphabet";
    } else{
        eCA.innerHTML = "<br>❌Capital Alphabet";
    }

    if(sa == 1){
        eSA.innerHTML = "<br>✔️Small Alphabet";
    } else{
        eSA.innerHTML = "<br>❌Small Alphabet";
    }

    if(d == 1){
        eD.innerHTML = "<br>✔️Digit";
    } else{
        eD.innerHTML = "<br>❌Digit";
    }

    if(sc == 1){
        eSC.innerHTML = "<br>✔️Special Characters";
    } else{
        eSC.innerHTML = "<br>❌Special Characters";
    }
});

//FIRST NAME LIVE VALIDATION
document.getElementById("fname").addEventListener("input", () => {
    const val = document.getElementById("fname").value;
    const efname = document.getElementById("efname");
    const sub = document.getElementById("x");

    let flag = 1;
    for (let i = 0; i < val.length; i++) {
        if ((val[i] >= 'A' && val[i] <= 'Z') || (val[i] >= 'a' && val[i] <= 'z') || val[i] == ' ') continue;
        flag = 0;
        break;
    }

    if (flag == 0) {
        efname.innerHTML = "<br>Only alphabets are allowed";
        efname.style.color = "Red";
        sub.disabled = true;
    } else {
        efname.innerHTML = "";
        sub.disabled = false;
    }
});

//LAST NAME LIVE VALIDATION
document.getElementById("lname").addEventListener("input", () => {
    const val = document.getElementById("lname").value;
    const elname = document.getElementById("elname");

    let flag = 1;
    for (let i = 0; i < val.length; i++) {
        if ((val[i] >= 'A' && val[i] <= 'Z') || (val[i] >= 'a' && val[i] <= 'z') || val[i] == ' ') continue;
        flag = 0;
        break;
    }

    if (flag == 0) {
        elname.innerHTML = "<br>Only alphabets are allowed";
        elname.style.color = "Red";
    } else {
        elname.innerHTML = "";
    }
});

//REGISTRATION FORM VALIDATION
function test() {
    let fname = document.getElementById("fname").value.trim();
    let lname = document.getElementById("lname").value.trim();
    let contact = document.getElementById("con").value.trim();
    let password = document.getElementById("regPass").value.trim();
    let sub = document.getElementById("x");

    // First name validation
    if (fname === "") {
        alert("First name is required!");
        return false;
    }

    // Last name validation
    if (lname === "") {
        alert("Last name is required!");
        return false;
    }

    // Contact validation
    if (contact.length !== 11 || isNaN(contact)) {
        alert("Contact must be 11 digits!");
        return false;
    }

    // Password validation
    if (password.length < 6) {
        alert("Password must be at least 6 characters!");
        return false;
    }

    alert("Registration Successful!");
    return true;
}