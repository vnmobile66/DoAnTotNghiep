let loginBtn = document.getElementById("login-btn");
let myPhone = document.getElementById("phonenumber");
let myPass = document.getElementById("password");

// Dinh dang so dien thoai
function isPhone(number) {
    return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}

// Check SDT (So bo)
myPhone.addEventListener("change", ()=>{
    let isTooltip = document.querySelector(".tooltip");
    // Lam sach:
    let valuePhone = myPhone.value.trim();
    // Check dinh dang:
    if(!isPhone(valuePhone)){
        isTooltip.style.visibility = "visible";
        isTooltip.style.opacity = 1;
        isTooltip.innerHTML = "Sai định dạng";
        myPhone.style.border = 2 + "px solid red";
        return false;
    }
    else{
        isTooltip.style.visibility = "hidden";
        isTooltip.style.opacity = 0;
        myPhone.style.border = 2 + "px solid cornflowerblue";
        return true;
    }
})

// Lam sach mat khau (So bo)
myPass.addEventListener("change", ()=>{
    myPass.value.trim();
})