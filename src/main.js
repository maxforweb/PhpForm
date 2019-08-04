function returnFunc() {
    if (window.location.href == 'http://qualitydesign.kl.com.ua/src/form.php'){
        window.location.replace('http://qualitydesign.kl.com.ua');
        
    }
}

setTimeout(returnFunc, 3000);



var burger = document.getElementById('burger');

burger.addEventListener("click", function(){
    let menu = document.getElementById('menu');
    menu.classList.toggle("menu-active");
    let roate = document.getElementById('rotate').classList.toggle("rotate");
});


