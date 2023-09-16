import styles from './page.module.css'
import {useState, useMemo, useEffect, useRef} from 'react'
import 'bootstrap/dist/css/bootstrap.min.css'
import Link from 'next/link';


function Home(){
      return (
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
                        <div className="row">
                              <div className="col">
                                    
                              </div>
                        </div>
                  </div>
            </main>
      )
}

export default Home;