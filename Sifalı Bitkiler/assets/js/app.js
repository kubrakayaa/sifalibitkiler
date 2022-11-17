const nav = document.getElementById("up-menu");

function animation(){
    var controller = new ScrollMagic.Controller();

    const t1 = gsap.timeline({default: {ease: Expo.inOut}});

    t1.fromTo(".up-number-menu", 0.5, {x: "3rem", opacity: 0}, {x: 0, opacity: 1}, "+=2");
    t1.fromTo(nav, 0.7, {y: "-10rem", opacity: 0}, {y: 0, opacity: 1});
    t1.fromTo(".navbarr", 0.5, {x: "3rem", opacity: 0}, {x: 0, opacity: 1});

    t1.fromTo(".logo", 0.5, {x: "-3rem", opacity: 0}, {x: 0, opacity: 1});
    t1.fromTo(".corusel-baslik", 0.5, {x: "3rem", opacity: 0}, {x: 0, opacity: 1}, "-=0.5");
    t1.fromTo(".carousel-font", 0.3, {x: "3rem", opacity: 0}, {x: 0, opacity: 1});
    t1.fromTo(".more", 0.3, {x: "3rem", opacity: 0}, {x: 0, opacity: 1});
    t1.fromTo(".carousel-img", 0.5, {opacity: 0}, {opacity: 1}, "-=1.5");

    const t2 = gsap.timeline({default: {ease: Expo.inOut}});
    
    
    t2.fromTo(".main-left", 0.5, {x: "3rem", opacity: 0}, {x: 0, opacity: 1});
    t2.fromTo(".main-baslik", 0.5, {x: "3rem", opacity: 0}, {x: 0, opacity: 1});
    t2.fromTo(".main-aciklama", 0.5, {x: "3rem", opacity: 0}, {x: 0, opacity: 1});
    t2.fromTo(".bitki-baslik", 0.7, {y: "3rem", opacity: 0}, {y: 0, opacity: 1});
    t2.fromTo(".bitki-cards", 0.7, {y: "3rem", opacity: 0}, {y: 0, opacity: 1, stagger: 0.3});
	t2.set(".bitki-cards", {clearPops: "all"});
    t2.fromTo(".hastaliklar-baslik", 0.7, {y: "3rem", opacity: 0}, {y: 0, opacity: 1});

	t2.fromTo(".hastaliklar-cards", 0.7, {y: "3rem", opacity: 0}, {y: 0, opacity: 1, stagger: 0.3});
	t2.set(".hastaliklar-cards", {clearPops: "all"});








    new ScrollMagic.Scene({
        triggerElement: "#main",
        triggerHook: 0.5,
        reverse: false
    }).setTween(t2)
    .addTo(controller);

    const t3 = gsap.timeline({default: {ease: Expo.inOut}});

    t3.fromTo(".section1", 0.3 ,{y: "-3rem", opacity: 0}, {y: 0, opacity: 1});
    t3.fromTo(".section2", 0.3 ,{y: "-3rem", opacity: 0}, {y: 0, opacity: 1});
    t3.fromTo(".section3", 0.3 ,{y: "-3rem", opacity: 0}, {y: 0, opacity: 1});


    new ScrollMagic.Scene({
        triggerElement: "#main2",
        triggerHook: 0.5,
        reverse: false
    }).setTween(t3)
    .addTo(controller);

}

animation();

window.addEventListener("scroll", function(){
    if (window.scrollY === 0){
        nav.setAttribute("style", "opacity: 1;");
		document.getElementById("home").setAttribute("style", "opacity: 0;")

    }
	else if(window.scrollY > document.getElementById("up-menu").offsetTop){
		console.log("a");
		document.getElementById("home").setAttribute("style", "opacity: 1;")
		document.getElementById("up-menu").setAttribute("style", "position: fixed; opacity: 0.9;");
		
	}

})

window.onload =function run(){
    setTimeout(function (){
        document.querySelector(".preloader").setAttribute("style", "display: none;");
    }, 2000);
   
};

