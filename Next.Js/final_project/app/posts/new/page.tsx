'use client'

import { useState, useEffect } from 'react'
import { useRouter } from 'next/navigation'
import { toast, ToastContainer } from 'react-toastify'
import { jwtDecode } from 'jwt-decode'
import 'react-toastify/dist/ReactToastify.css'

type DecodedToken = { userId: number; exp: number }

export default function CreatePost() {
  const [title, setTitle] = useState('')
  const [content, setContent] = useState('')
  const [userId, setUserId] = useState<number | null>(null)
  const router = useRouter()

  useEffect(() => {
    const token = localStorage.getItem('token')
    if (!token) {
      router.push('/')
      return
    }
    try {
      const decoded: DecodedToken = jwtDecode(token)
      setUserId(decoded.userId)
    } catch {
      router.push('/')
    }
  }, [router])

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    if (!userId) return
    try {
      const res = await fetch('/api/posts', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ title, content, userID: userId }),
      })
      if (res.ok) {
        toast.success('Created!', { position: 'top-center' })
        setTimeout(() => router.push('/'), 1000)
      } else throw new Error()
    } catch {
      toast.error('Creation failed.', { position: 'top-center' })
    }
  }

  return (
    <>
      <ToastContainer />
      <div className="min-h-screen flex items-center justify-center  text-gray-100 px-4">
        <div className="w-full max-w-xl bg-stone-700 shadow-lg rounded-2xl p-8 space-y-6">
          <h1 className="text-3xl font-bold text-center">New Post</h1>
          <form onSubmit={handleSubmit} className="space-y-5">
            <div>
              <label htmlFor="title" className="block mb-2">Title</label>
              <input
                id="title" placeholder="Enter title" value={title} onChange={e => setTitle(e.target.value)}
                className="w-full px-4 py-3 rounded-lg bg-white text-black "
                required
              />
            </div>

            <div>
              <label htmlFor="content" className="block mb-2">Content</label>
              <textarea
                id="content" placeholder="Write here..." value={content} onChange={e => setContent(e.target.value)}
                className="w-full h-32 px-4 py-3 rounded-lg bg-white text-black resize-none"
                required
              />
            </div>

            <button type="submit" className="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 font-semibold transition">Create Post</button>
          </form>
        </div>
      </div>
    </>
  )
}