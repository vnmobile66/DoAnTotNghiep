// Tối ưu hiệu suất
function load(img){
    const url = img.getAttribute('lazy-src');
    img.setAttribute('src',url)
}
function ready() {
    if('IntersectionObserver' in window){
        var lazy = document.querySelectorAll('[lazy-src]');
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    load(entry.target);
                }
            })
        });

        lazy.forEach(img => {
            observer.observe(img);
        })
    }
    else{
        
    }
}

document.addEventListener('DOMContentLoaded', ready)