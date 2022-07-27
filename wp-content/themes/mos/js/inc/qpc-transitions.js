import { gsap } from "gsap";

const qpcTransitions = (qpcTransitions) => {

  //  Animazione per tutte le pagine
    var tl = gsap.timeline();

      tl.to(".loading-container", {
          duration: 1.2,
          width: "100%",
          top: "0",
          ease: "Expo.easeInOut",
      });

      tl.to(".loading-container", {
          duration: 1,
          width: "100%",
          top: "100vh",
          ease: "Expo.easeInOut",
          delay: 0.3,
      });
      tl.set(".loading-container", { top: "-100vh" });

  //  tl.to('.loading-container', { duration: 1, opacity: 1, ease: "power1.out", delay: 0.5 });
  //  tl.to('.loading-container', {opacity:0, display:"none"});

    //tl.to('.loading-container', { duration: .5, opacity: 1,  ease: "power1.out", delay: 1 });
  //  $(".loading-container").addClass("active");


}
export { qpcTransitions };
