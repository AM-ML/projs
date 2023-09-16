let elem = document.querySelector('.guess');

fade(elem, 0, 20, 0.01);


setTimeout(function(){
      fade(elem, 1, 20, -0.01)
}, 1500)