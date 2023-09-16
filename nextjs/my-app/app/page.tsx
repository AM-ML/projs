import Link from 'next/link';
import Image from 'next/image'
import styles from './page.module.css'

function Header() {
  return (
    <header className={styles.header}>
      <h1>
        Header
      </h1>
    </header>
  )
}

const DescriptionParam = {
  text: String
}

function Description(){
  return (
    <div className={styles.description}>
      <p>This is a description.
        <b>
        <Link href='/count' className={styles.Link}>
          |  Counter | 
        </Link>
        <Link href='/about' className={styles.Link}>
          | About | 
          </Link>
          <Link href='/focus' className={styles.Link}>
          | Focus(Ref) | 
          </Link>
        </b>
      </p>
    </div>
  )
}

function Home() {
  return (
    <>
      <main className={styles.main}>
          <Header />
          <Description />
      </main>
    </>
  )
}

export default Home;