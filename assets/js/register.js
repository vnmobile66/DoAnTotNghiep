// Nut chuc nang
let showPass = document.getElementById("show-pass");
let showRePass = document.getElementById("show-re-pass");
// Kiem tra form dang ky
let fullName = document.getElementById("fullname");
let phoneNumber = document.getElementById("phonenumber");
let myPassword = document.getElementById("password");
let rePassword = document.getElementById("re-password");

// Hien thi mat khau
showPass.addEventListener("click",()=>{
    if(myPassword.type == "password"){
        showPass.innerHTML = `<i class="bi bi-eye-slash"></i>`;
        myPassword.type = "text";
        return myPassword.type;
    }
    else{
        showPass.innerHTML = `<i class="bi bi-eye"></i>`;
        myPassword.type = "password";
        return myPassword.type;
    }
})

// Hien thi nhap lai mat khau
showRePass.addEventListener("click",()=>{
    if(rePassword.type == "password"){
        showRePass.innerHTML = `<i class="bi bi-eye-slash"></i>`;
        rePassword.type = "text";
        return rePassword.type;
    }
    else{
        showRePass.innerHTML = `<i class="bi bi-eye"></i>`;
        rePassword.type = "password";
        return rePassword.type;
    }
})

// Kiem tra Ho Ten
function removeAscent (str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
}
function isName(name) {
    var re = /^[a-zA-Z)\(" "]{2,}$/g;
    return re.test(removeAscent(name))
}
fullName.addEventListener("change",()=>{
    let filterName = fullName.value.trim();
    if(!isName(filterName)){
        fullName.style.border = 2 + "px solid red";
        return false;
    }
    else{
        fullName.style.border = 2 + "px solid blue";
        return true;
    }
})

// Kiem tra So dien thoai
function isPhone(phone) {
    return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(phone);
}
phoneNumber.addEventListener("change",()=>{
    let filterPhone = phoneNumber.value.trim();
    if(!isPhone(filterPhone)){
        phoneNumber.style.border = 2 + "px solid red";
        return false;
    }
    else{
        phoneNumber.style.border = 2 + "px solid blue";
        return true;
    }
})

// Kiem tra Mat khau
function isPass(pass) {
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(pass);
}
myPassword.addEventListener("input",()=>{
    let filterPass = myPassword.value.trim();
    // Thanh suc manh
    let strongPass = document.getElementById("strong-pass");
    strongPass.style.width = (filterPass.length/100) + "%";
    if(filterPass.length == 0){
        strongPass.style.width = 0 + "%";
        strongPass.style.background = "none";
    }
    else if(filterPass.length < 8){
        strongPass.style.width = (100/3) + "%";
        strongPass.style.background = "red";
    }
    else if(filterPass.length < 12){
        strongPass.style.width = (100/3) + (100/3) + "%";
        strongPass.style.background = "orange";
    }
    else{
        strongPass.style.width = 100 + "%";
        strongPass.style.background = "#1ffb1f";
    }
})
// Kiem tra Nhap lai mat khau
rePassword.addEventListener("change",()=>{
    let filterRePass = rePassword.value.trim();
    if(filterRePass == myPassword.value.trim()){
        rePassword.style.border = 2 + "px solid blue";
        return true;
    }
    else{
        rePassword.style.border = 2 + "px solid red";
        return false;
    }
})