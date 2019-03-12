import SmoothScrooll from './modules/_smoothScroll';
import ImageFade from './modules/_imageFade';

new SmoothScrooll();
let group1 = document.querySelectorAll(".group1 img");
let group2 = document.querySelectorAll(".group2 img");
let group3 = document.querySelectorAll(".group3 img");
new ImageFade(group1);
new ImageFade(group2, 4000);
new ImageFade(group3, 3500);

