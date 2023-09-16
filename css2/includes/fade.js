function alpha(element, value) {
      function parseRGB(colorString) {
            const match = colorString.match(/rgba?\((\d+), (\d+), (\d+)(, \d+(\.\d+)?)?\)/);
            if (match) {
              const [, r, g, b] = match.map(Number);
              return { r, g, b };
            }
            return null;
          }
      
      let comp = getComputedStyle(element);
      
      let color = comp.color;
      
      let rgb = parseRGB(color);
      
      let {r, g, b} = rgb;
      
      let rgba = `rgba(${r}, ${g}, ${b}, ${value})`;
      
      element.style.color = rgba;   
}

function fade(elem, start, speed, step) {
      setTimeout(function () {
        start += step;
        alpha(elem, start);
    
        if ((step > 0 && start >= 1) || (step < 0 && start <= 0)) {
          // Exit the function when the animation is complete
          return;
        }
    
        // Continue the animation
        fade(elem, start, speed, step);
      }, speed);
    }
