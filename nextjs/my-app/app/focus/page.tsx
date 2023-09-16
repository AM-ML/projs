'use client';

import { useMemo, useEffect, useState, useRef } from 'react'
import styles from './page.module.css'
import { log } from 'console';
import Link from 'next/link';
import 'bootstrap/dist/css/bootstrap.min.css'
function Home() {

      const inputRef = useRef<HTMLInputElement>(null);
      const [value, setValue] = useState('Input Correct Email');

      const handleClick = () => {
            if(inputRef.current)
                  inputRef.current.focus();
      }

      const outputClick = () => {
            if(inputRef.current){
                  setValue(inputRef.current.value);

                  if(inputRef.current.value == "aliredamoumneh@gmail.com"){
                        setSuccess(true)
                        setShouldLoged(true)
                  }
                  
                  else 
                        setSuccess(false)

                  if(inputRef.current.value == "")
                        setValue("Enter Correct Email.");
            }
      }

      let [success, setSuccess] = useState(false);

      let [alert, setAlert] = useState('');

      let sucRef = useRef<HTMLSmallElement>(null) 

      const loged = () => {
            console.log('Logged.');

            return 1;
            
      }

      useEffect(() => {
            if(success){
                  setAlert('Correct!');
                  if(sucRef.current){
                        sucRef.current.style.color = "springgreen";
                  }
            }
            else{
                  setAlert('Incorrect!');
                  if(sucRef.current){
                        sucRef.current.style.color = '#B95353'
                  }
            }
      }, [success])

      let [shouldLoged, setShouldLoged] = useState(false);

      let num = useMemo(() => loged(), [shouldLoged])

      return (
            <main className={styles.main}>
                  <header className="bg-light">
                        <span className="pe-3"><Link href="/">Home &nbsp;| </Link></span>
                        <span className="pe-3">
                              <Link href="/count">Counter &nbsp;| </Link>      
                        </span> 
                        <span className="pe-3">
                              <Link href="/about">About (example) &nbsp;| </Link>      
                        </span>
                        <span className="pe-0">
                              <Link href="/arg">arguments</Link>      
                        </span>      
                  </header>    
                  <h1 className={styles.title}>
                        useRef Example
                  </h1>
                  <input onInput={outputClick} type="search" ref={inputRef} />
                  <button onClick={handleClick} className="btn btn-outline-light">Focus</button>

                  <p className={styles.output}>{value}</p>

                  <small ref={sucRef} className={" color-light"}>{alert}</small>
            </main>
      )
}


export default Home;