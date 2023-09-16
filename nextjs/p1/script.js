/* ReactDOM.render(htmlElem, container) */
ReactDOM.render(<h1><b>Hello, React!</b></h1>, document.querySelector(".react"));


let n = 10;

/* the {} tags are used to insert js data / variables 
   into the html element innertext */
ReactDOM.render(<h1>N = {n}</h1>, document.querySelector(".num"));