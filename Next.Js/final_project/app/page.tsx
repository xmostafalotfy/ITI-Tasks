'use client'

import { useEffect, useState } from 'react'
import Link from 'next/link'

export default function Home() {
  const [posts, setPosts] = useState<any[]>([])
  const [isLoggedIn, setIsLoggedIn] = useState(false)

  const fetchPosts = async () => {
    const res = await fetch('/api/posts')
    const data = await res.json()
    setPosts(data)
  }

  useEffect(() => {
    fetchPosts()
    const token = localStorage.getItem('token')
    setIsLoggedIn(!!token)
  }, [])

  const handleDelete = async (id: number) => {
    await fetch(`/api/posts/${id}`, { method: 'DELETE' })
    fetchPosts()
  }

  return (
    <main className="min-h-screen  text-gray-100 py-10 px-6 flex flex-col items-center">
      <div className="w-full max-w-4xl">
        <div className="flex items-center justify-between mb-10">
          <h1 className="text-4xl font-bold">All Posts</h1>
          {isLoggedIn && (
            <Link href="/posts/new" className="bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-lg font-medium transition">+ New Post</Link>
          )}
        </div>

        {posts.length === 0 ? (
          <p className="text-gray-400 text-center">No posts. Be the first!</p>
        ) : (
          <ul className="space-y-6">
            {posts.map(post => (
              <li key={post.id} className="bg-stone-700 border border-gray-700 rounded-2xl p-6 shadow-lg">
                <h2 className="text-2xl font-semibold mb-2">{post.title}</h2>
                <p className="mb-4">{post.content}</p>
                <p className="text-sm italic mb-4">By {post.user?.name ?? 'Unknown'}</p>
                {isLoggedIn && (
                  <div className="flex gap-4">
                    <Link href={`/posts/${post.id}`} className="text-green-400 hover:underline">Edit</Link>
                    <button onClick={() => handleDelete(post.id)} className="text-red-400 hover:underline">Delete</button>
                  </div>
                )}
              </li>
            ))}
          </ul>
        )}
      </div>
    </main>
  );
}
