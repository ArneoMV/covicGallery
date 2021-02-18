$(document).ready(function() {
 let scroll_tl = gsap.timeline({
  scrollTrigger: {
    trigger: '.trigger-image',
    start: "top center",
    //pin: true,
    scrub: true,
    end: "+=300",
    markers: true
  }
 }),
 facts = [...document.querySelectorAll('.fact')]
 scroll_tl.to('.factsContainer h2', {
  scale: 1.5,
  duration: 2,
  ease: "slow"
 })
 scroll_tl.to(facts, {
  xPercent: -85 * (facts.length - 1),
  scrollTrigger: {
    trigger: ".page2",
    start: "center center",
    pin: true,
    // horizontal: true,
    // pinSpacing:false,
    // markers: true,
    scrub: 1,
    snap: 1 / (facts.length - 1),
    // base vertical scrolling on how wide the container is so it feels more natural.
    // end: () => `+=${smallFactsContainer.offsetWidth}`
    end: () => `+=5320`
  }
 });
})

