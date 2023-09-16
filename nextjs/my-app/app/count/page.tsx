'use client';

import styles from './page.module.css';
import { useEffect, useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css'; 
import { log } from 'console';
import Link from 'next/link';


function Home() {
 const [counter, setCounter] = useState<number>(0);
//  const [success, setSuccess] = useState<Boolean>(false);
 const handleClick = (n: number) => {
  setCounter(counter + n); 
}
 const resetCounter = () => {
      setCounter(0);      
 }

 useEffect(() => {
      if(counter % 10 == 0 && counter > 0)
            console.log('success');
            
 }, [counter])
 
 return (
     <>
     <header>
          <span className={'pe-5 span'+ styles.span}>
               <Link href="/">Home</Link>
          </span>
          <span className={'pe-5 span'+ styles.span}>
               <Link href="/focus">Focus (useRef)</Link>
          </span>
          <span className={'pe-5 span'+ styles.span}>
               <Link href="/about">About (Example)</Link>
          </span>
     </header>
  <main className={styles.main + " bg-dark color-light p-5"}>
   <div className="container border border-primary mt-5">
   <h1 className={styles.display + " color-light center ms-auto"}>{counter}</h1>
    <div className="row">
            <button onClick={() => handleClick(1)} className={"btn btn-outline-info btn-lg col-3"}>+1</button>
            <button onClick={() => handleClick(10)} className={"btn btn-outline-info btn-lg col-3"}>+10</button>
            <button onClick={() => handleClick(100)} className={"btn btn-outline-info btn-lg col-3"}>+100</button>
            <button onClick={() => handleClick(1000)} className={"btn btn-outline-info btn-lg col-3"}>+1000</button>
    </div>
    <div className="row">
       <button onClick={resetCounter} className={"btn btn-outline-danger btn-lg"}>Reset</button>
    </div>
   </div>
  </main>
  </>
 )
}

export default Home;