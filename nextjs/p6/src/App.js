import React, { useState, useEffect } from 'react';
import './App.css'
import logo from './logo192.png'
function App() {
  const [facts, setFacts] = useState([]);

  useEffect(() => {
    // Fetch data from the JSON file
    fetch('/facts.json')
      .then((response) => response.json())
      .then((data) => setFacts(data))
      .catch((error) => console.error('Error fetching data:', error));
  }, []);

  const rm = () => {
    document.querySelectorAll("section").forEach((section) => {
      section.style.display = "none";
    });
  };

  const listen = () => {
    document.querySelectorAll("a").forEach((ahref) => {
      ahref.addEventListener("click", function () {
        let val = ahref.getAttribute("value");
        if (val == null) return false;
        rm();
        document.querySelector(val).style.display = "block";
      });
    });
  };

  // Call listen() after rendering
  useEffect(() => {
    listen();
  }, []);

  return (
    <div className="App">
      <nav>
        <img src={logo} width="102" alt="Logo" />
          <li><a href="#" value="#home">Home</a></li>
          <li><a href="#" value="#pricing">Pricing</a></li>
          <li><a href="#" value="#about">About</a></li>
          <li><a href="#" value="#contact">Contact</a></li>
      </nav>
      <section id="home">
        <div className="home container">
          <svg xmlns="http://www.w3.org/2000/svg" width="60" viewBox="-11.5 -10.23174 23 20.46348">
            <circle cx="0" cy="0" r="2.05" fill="#61dafb" />
            <g stroke="#61dafb" strokeWidth="1" fill="none">
              <ellipse rx="11" ry="4.2" />
              <ellipse rx="11" ry="4.2" transform="rotate(60)" />
              <ellipse rx="11" ry="4.2" transform="rotate(120)" />
            </g>
          </svg>
          <h1 className="home-lg">ReactJS Facts</h1>
        </div>
        <div className="facts container">
          {facts.map((fact, index) => (
            <div className="fact" key={index}>
              <h1>{fact.fact}</h1>
            </div>
          ))}
        </div>
      </section>
      <section id="pricing">
        <div>
          <h1>Pricing</h1>
        </div>
      </section>
      <section id="about">
        <div>
          <h1>About</h1>
        </div>
      </section>
      <section id="contact">
        <div>
          <h1>Contact</h1>
        </div>
      </section>
    </div>
  );
}

export default App;
