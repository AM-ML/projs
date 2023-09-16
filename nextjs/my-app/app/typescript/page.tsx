'use client';

import styles from './page.module.css'
import {useState, useMemo, useEffect, useRef} from 'react'
import 'bootstrap/dist/css/bootstrap.min.css'
import Link from 'next/link';


function Home(){

      const [todos, setTodos] = useState([]);

  useEffect(() => {
    // Fetch data from an API or source
    async function fetchData() {
      try {
        const response = await fetch('https://jsonplaceholder.typicode.com/todos');
        const data = await response.json();
        setTodos(data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    fetchData();
  }, []);
      
      return (
      <body className={styles.body}>            
            <main className={styles.main}>
                  <header className={styles.header}>
                        <div className="container bg-secondary">
                              <div className="row">
                                    <div className="col border-end border-dark">
                                          <Link href="/">Home</Link>
                                    </div>
                                    <div className="col border-end border-dark"><Link href="/count">Counter</Link></div>
                                    <div className="col border-end border-dark"><Link href="/focus">Focus</Link></div>
                                    <div className="col border-end border-dark"><Link href="/about">About</Link></div>
                              </div>
                              <div className="row border-top border-dark mt-1">
                                    <div className="col border-end border-dark">
                                          <Link href="/arg">Arguments</Link>
                                    </div>
                              </div>
                        </div>
                  </header>

                  <div className="container mt-3">
                        <div>
                        {todos.map((todo) => (
                              <div key={todo.id}>
                              <span>ID: {todo.id}</span>
                              <p>Title: {todo.title}</p>
                              <small>Completed: {todo.completed.toString()}</small>
                              </div>
                        ))}
                  </div>
                  </div>
            </main>
      </body>
      )
}

export default Home;
