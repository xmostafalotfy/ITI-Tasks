'use client'

import { useState } from 'react'
import { useRouter } from 'next/navigation'
import Link from 'next/link'
import { toast, ToastContainer } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'

export default function RegisterPage() {
  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')
  const router = useRouter()

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    const res = await fetch('/api/auth/register', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ name, email, password }),
    })
    if (res.ok) {
      toast.success('Registration successful! Please log in.', { position: 'top-center' })
      setTimeout(() => router.push('/login'), 1000)
    } else {
      const data = await res.json()
      toast.error(data.error || 'Registration failed', { position: 'top-center' })
    }
  }

  return (
    <>
      <ToastContainer />
      <section className="min-h-screen flex items-center justify-center  text-gray-100 px-4">
        <form onSubmit={handleSubmit} className="w-full max-w-md bg-stone-700 shadow-lg rounded-2xl p-8 space-y-6">
          <h1 className="text-4xl font-bold text-center">Register</h1>

          <div>
            <label className="block mb-2">Name</label>
            <input
              type="text" value={name} onChange={e => setName(e.target.value)}
              placeholder="Your Full Name"
              className="w-full px-4 py-3 rounded-lg bg-white text-black"
              required
            />
          </div>

          <div>
            <label className="block mb-2">Email</label>
            <input
              type="email" value={email} onChange={e => setEmail(e.target.value)}
              placeholder="you@example.com"
              className="w-full px-4 py-3 rounded-lg bg-white text-black"
              required
            />
          </div>

          <div>
            <label className="block mb-2">Password</label>
            <input
              type="password" value={password} onChange={e => setPassword(e.target.value)}
              className="w-full px-4 py-3 rounded-lg bg-white text-black"
              required
            />
          </div>

          <button type="submit" className="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 font-semibold transition">Register</button>

          <p className="text-center text-gray-400">
            Have an account?{' '}
            <Link href="/login" className="text-indigo-400 hover:underline">Login</Link>
          </p>
        </form>
      </section>
    </>
  )
}
