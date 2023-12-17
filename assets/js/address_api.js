const host = 'https://provinces.open-api.vn/api/';
let myConscious = document.getElementById("conscious");
let myDistricts = document.getElementById("districts");
let myWards = document.getElementById("wards");
fetch(host)
.then(response => response.json())
.then(data => {
    let conscious = data;
    conscious.map(value => myConscious.innerHTML += `<option value="${value.code}">${value.name}</option>`)
})

function getDistricts(){
    fetch(`https://provinces.open-api.vn/api/p/${myConscious.value}?depth=2`)
    .then(response => response.json())
    .then(data => {
        let districts = data.districts;
        myDistricts.innerHTML = `<option value="">-- Chọn Quận/Huyện --</option>`;
        if(districts !== undefined){
            districts.map(value => myDistricts.innerHTML += `<option value="${value.code}">${value.name}</option>`)
        }
    })
}

function getWards(){
    fetch(`https://provinces.open-api.vn/api/d/${myDistricts.value}?depth=2`)
    .then(response => response.json())
    .then(data => {
        let wards = data.wards;
        myWards.innerHTML = `<option value="">-- Chọn Phường/Xã --</option>`;
        if(wards !== undefined){
            wards.map(value => myWards.innerHTML += `<option value="${value.code}">${value.name}</option>`)
        }
    })
}

function selectConscious(event){
    getDistricts(event.target.value);
<<<<<<< HEAD
    myWards.innerHTML = `<option value="">-- Chọn Phường/Xã --</option>`;
=======
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
}

function selectDistricts(event){
    getWards(event.target.value);
}