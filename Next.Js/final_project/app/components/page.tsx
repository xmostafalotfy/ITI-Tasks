'use client'

import { useEffect, useState } from 'react'
import Link from 'next/link'
import { useRouter } from 'next/navigation'
import { Montserrat } from 'next/font/google'

const montserrat = Montserrat({
  subsets: ['latin'],
  weight: ['400','600','800'],
})

export default function Navbar() {
  const [isLoggedIn, setIsLoggedIn] = useState(false)
  const router = useRouter()

  useEffect(() => {
    setIsLoggedIn(!!localStorage.getItem('token'))
  }, [])

  const handleLogout = () => {
    // 1) clear token
    localStorage.removeItem('token')
    // 2) update state so React re-renders
    setIsLoggedIn(false)
    // 3) client‐side redirect (no full page reload)
    router.push('/login')
  }

  return (
    <nav className="bg-stone-700 text-gray-100 shadow-lg py-4">
      <div className="container mx-auto flex justify-between items-center px-4">
        <Link href="/" className={`text-3xl font-bold ${montserrat.className}`}>
          FluxFeed
        </Link>
        <div className="flex space-x-6">
          {isLoggedIn ? (
            <button
              onClick={handleLogout}
              className="text-red-400 font-medium hover:text-red-300 transition"
            >
              Logout
            </button>
          ) : (
            <Link
              href="/login"
              className="text-gray-200 font-medium hover:text-blue-400 transition"
            >
              Login
            </Link>
          )}
        </div>
      </div>
    </nav>
  )
}
