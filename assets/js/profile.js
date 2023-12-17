// Hien thi hinh anh
let myAvatar = document.querySelector(".my-avatar"),
avatarUpdate = document.querySelector("#edit-avatar"),
cancel = document.getElementById("cancel"),
confirmBtn = document.getElementById("confirm");
avatarUpdate.addEventListener("change",()=>{
    myAvatar.src = URL.createObjectURL(avatarUpdate.files[0]);

    cancel.style.display = "block";
    confirmBtn.style.display = "block";

    avatarUpdate.style.display = "none";
})
var myAvt = myAvatar.src;
cancel.addEventListener('click',()=>{

    myAvatar.src = myAvt;

    cancel.style.display = "none";
    confirmBtn.style.display = "none";

    avatarUpdate.style.display = "none";
})

// Hien thi Modal Change Password
let changePassModal = document.getElementById("changePass");
let btn = document.getElementById("edit-pass");
let span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  changePassModal.style.display = "block";
}
span.onclick = function() {
  changePassModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == changePassModal) {
    changePassModal.style.display = "none";
  }
}

// Get Change Password
let oldPass = document.getElementById("old-pass"),
newPass = document.getElementById("new-pass"),
reNewPass = document.getElementById("re-newPass");
// Get Show Pass
let showOldPass = document.getElementById("show-old-pass"),
showNewPass = document.getElementById("show-new-pass"),
showReNewPass = document.getElementById("show-re-newPass");

// Hien thi mat khau cu
showOldPass.addEventListener("click",()=>{
    if(oldPass.type == "password"){
        showOldPass.innerHTML = `<i class="bi bi-eye-slash"></i>`;
        oldPass.type = "text";
        return oldPass.type;
    }
    else{
        showOldPass.innerHTML = `<i class="bi bi-eye"></i>`;
        oldPass.type = "password";
        return oldPass.type;
    }
})
// Hien thi mat khau moi
showNewPass.addEventListener("click",()=>{
    if(newPass.type == "password"){
        showNewPass.innerHTML = `<i class="bi bi-eye-slash"></i>`;
        newPass.type = "text";
        return newPass.type;
    }
    else{
        showNewPass.innerHTML = `<i class="bi bi-eye"></i>`;
        newPass.type = "password";
        return newPass.type;
    }
})
// Hien thi nhap lai mat khau moi
showReNewPass.addEventListener("click",()=>{
    if(reNewPass.type == "password"){
        showReNewPass.innerHTML = `<i class="bi bi-eye-slash"></i>`;
        reNewPass.type = "text";
        return reNewPass.type;
    }
    else{
        showReNewPass.innerHTML = `<i class="bi bi-eye"></i>`;
        reNewPass.type = "password";
        return reNewPass.type;
    }
})

// Kiem tra mat khau moi
function isNewPass(pass) {
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(pass);
}
newPass.addEventListener("input",()=>{
    let filterNewPass = newPass.value.trim();
    if(!isNewPass(filterNewPass)){
        newPass.style.border = 2 + "px solid red";
        return false;
    }
    else{
        newPass.style.border = 2 + "px solid blue";
        return true;
    }
})
reNewPass.addEventListener("input",()=>{
    let filterReNewPass = reNewPass.value.trim();
    if(filterReNewPass == newPass.value.trim()){
        reNewPass.style.border = 2 + "px solid blue";
        return true;
    }
    else{
        reNewPass.style.border = 2 + "px solid red";
        return false;
    }
})

// Call APIs hien thi dia chi nguoi dung
// Tinh/Thanh pho
const host = 'https://provinces.open-api.vn/api/';
let myConscious = document.getElementById("myConscious"); // 87
let userConscious = document.getElementById("users_conscious");
fetch(host)
    .then(response => response.json())
    .then(data => {
        let conscious = data;
        let code = conscious.find(code => code.code == myConscious.value)
        conscious.map(() => {
            userConscious.innerHTML = `${code.name}`;
        })
    })
    .catch(error => {
        console.log("error:",error);
    })

// Quan/Huyen
let myDistricts = document.getElementById("myCity");
let userDistricts = document.getElementById("users_city");
fetch(`https://provinces.open-api.vn/api/p/${myConscious.value}?depth=2`)
    .then(response => response.json())
    .then(data => {
        let districts = data.districts;
        let districtsCode = districts.find(code => code.code == myDistricts.value)
        districts.map(() => {
            userDistricts.innerHTML = `${districtsCode.name}`;
        })
    })
    .catch(error => {
        console.log("error:",error);
    })

// Phuong/Xa
let myWards = document.getElementById("myWards");
let userWards = document.getElementById("users_wards");
fetch(`https://provinces.open-api.vn/api/d/${myDistricts.value}?depth=2`)
    .then(response => response.json())
    .then(data => {
        let wards = data.wards;
        let wardsCode = wards.find(code => code.code == myWards.value)
        wards.map(() => {
            userWards.innerHTML = `${wardsCode.name}`;
        })
    })
    .catch(error => {
        console.log("error:",error);
    })