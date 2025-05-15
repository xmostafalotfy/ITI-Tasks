import { Montserrat } from 'next/font/google'
import '../styles/globals.css'
import { Montserrat } from 'next/font/google';
const montserrat = Montserrat({ subsets: ['latin'], weight: ['400','600','800'] });        

const montserrat = Montserrat({
  subsets: ['latin'],
  weight: ['400','600','800'],
  variable: '--font-montserrat'
})

export default function App({ Component, pageProps }) {
  return (
    <main className={`${montserrat.className}  text-gray-100 min-h-screen`}>
  return (
    <main className={`${montserrat.className}  text-gray-100 min-h-screen`}>
      <Component {...pageProps} />
    </main>
  );
  )
}
