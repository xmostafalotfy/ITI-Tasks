'use client'

import { useState } from 'react'
import { useRouter } from 'next/navigation'
import Link from 'next/link'
import { toast, ToastContainer } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'

export default function LoginPage() {
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')
  const [emailError, setEmailError] = useState('')
  const [passwordError, setPasswordError] = useState('')
  const router = useRouter()

  const handleLogin = async (e: React.FormEvent) => {
    e.preventDefault()
    setEmailError('')  
    setPasswordError('')
    const res = await fetch('/api/auth/login', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ email, password }),
    })
    const data = await res.json()
    if (res.ok) {
      localStorage.setItem('token', data.token)
      localStorage.setItem('userName', data.user?.name || 'User')
      toast.success('Login successful! Redirecting...', { position: 'top-center' })
      setTimeout(() => router.push('/'), 1000)
    } else {
      if (data.error.includes('email')) setEmailError('Incorrect email or does not exist.')
      if (data.error.includes('password')) setPasswordError('Incorrect password.')
      toast.error(data.error || 'Login failed', { position: 'top-center' })
    }
  }

  return (
    <>
      <ToastContainer />
      <section className="min-h-screen flex items-center justify-center  text-gray-100 px-4">
        <form onSubmit={handleLogin} className="w-full max-w-md bg-stone-700 shadow-lg rounded-2xl p-8 space-y-6">
          <h1 className="text-4xl font-bold text-center">Log In</h1>

          <div>
            <label className="block mb-2">Email</label>
            <input
              type="email" value={email} onChange={e => setEmail(e.target.value)}
              placeholder="you@example.com"
              className="w-full px-4 py-3 rounded-lg bg-white text-black  "
              required
            />
            {emailError && <p className="mt-1 text-red-400">{emailError}</p>}
          </div>

          <div>
            <label className="block mb-2">Password</label>
            <input
              type="password" value={password} onChange={e => setPassword(e.target.value)}
              className="w-full px-4 py-3 rounded-lg bg-white text-black "
              required
            />
            {passwordError && <p className="mt-1 text-red-400">{passwordError}</p>}
          </div>

          <button type="submit" className="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 font-semibold transition">Login</button>

          <p className="text-center text-gray-400">
            No account?{' '}
            <Link href="/register" className="text-indigo-400 hover:underline">Register</Link>
          </p>
        </form>
      </section>
    </>
  )
}