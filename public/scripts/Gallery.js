$(document).ready(function() {
  // GALLERY AND PAGINATION

  // HOMEPAGE GALLERY 1 
  const galleryItems1 = document.querySelector(".gallery__items").children;
  const prev1 = document.getElementById("prev-1");
  const next1 = document.getElementById("next-1");
  const page1 = document.getElementById("page-num-1");

  // koliko slika se prikazuje
  const maxItem = 2;
  let index = 1;

  const pagination1 = Math.ceil(galleryItems1.length / maxItem);
  // console.log(pagination1);
  prev1.addEventListener("click",function() {
    index--;
    check1();
    showImages1();
  })

  next1.addEventListener("click",function() {
    index++;
    check1();
    showImages1();  
  });

  function check1() {
    if ( index == pagination1) { next1.classList.add("disabled"); }
    else { next1.classList.remove("disabled");	 }
    if (index == 1) { prev1.classList.add("disabled"); }
    else { prev1.classList.remove("disabled");	 }
  };
  function showImages1() {
      for (let i = 0 ;i < galleryItems1.length; i++ ) {
        galleryItems1[i].classList.remove("show");
        galleryItems1[i].classList.add("hide");

        if ( i >= (index * maxItem) - maxItem && i < index * maxItem ) {
          // if i greater than and equal to (index*maxItem)-maxItem;
        // means  (1*8)-8=0 if index=2 then (2*8)-8=8
          galleryItems1[i].classList.remove("hide");
          galleryItems1[i].classList.add("show");
        }
        page1.innerHTML=index;
      }  
  }
  showImages1();
  check1();

});