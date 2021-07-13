let imgBg = document.querySelector(".img-bg");
let txtImg = document.querySelector("#p-img");

imgBg.addEventListener("mouseleave", () => {
  txtImg.style.opacity = "0";
});

imgBg.addEventListener("mouseenter", () => {
  txtImg.style.opacity = "1";
});
