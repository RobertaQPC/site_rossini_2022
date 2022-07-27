const qpcHorizontalScrollText = (qpcHorizontalScrollText) => {

const lerp = (current, target, factor) => current * (1 - factor) + target * factor;

class LoopingText {
  constructor(el) {
    this.el = el;
    this.lerp = {current: 0, target: 0};
    this.interpolationFactor = 0.2;
    this.speed = 0.1;
    this.events();
    this.render();
  }

  events() {
    window.addEventListener("scroll", () => this.lerp.target += this.speed * 5);
  }

  animate() {
    this.lerp.target += this.speed;
    this.lerp.current = lerp(this.lerp.current, this.lerp.target, this.interpolationFactor);

    if (this.lerp.target > 100) {
      this.lerp.current -= this.lerp.target;
      this.lerp.target = 0;
    }

    this.el.style.transform = `translateX(${this.lerp.current}%)`;
  }

  render() {
    this.animate();
    window.requestAnimationFrame(() => this.render());
  }
}

document.querySelectorAll(".wrap-long-text").forEach(el => new LoopingText(el));
}
export { qpcHorizontalScrollText };
