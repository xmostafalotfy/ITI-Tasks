'use client';

import { useEffect, useState } from 'react';
import { useRouter, useParams } from 'next/navigation';
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

export default function EditPost() {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const [isUser, setIsUser] = useState(false);
  const router = useRouter();
  const { id } = useParams();

  useEffect(() => {
    const token = localStorage.getItem('token');
    if (!token) {
      router.push('/');
      return;
    }

    const fetchPost = async () => {
      const res = await fetch(`/api/posts/${id}`);
      const data = await res.json();
      if (!data.userID) return;
      const decoded = JSON.parse(atob(token.split('.')[1]));
      if (data.userID === decoded.userId) {
        setIsUser(true);
      } else {
        toast.error('Not authorized.', { position: 'top-center' });
        setTimeout(() => router.push('/'), 1000);
      }
      setTitle(data.title);
      setContent(data.content);
    };

    fetchPost();
  }, [id, router]);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!isUser) return;
    const res = await fetch(`/api/posts/${id}`, {
      method: 'PUT', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ title, content }),
    });
    if (res.ok) {
      toast.success('Post updated!', { position: 'top-center' });
      setTimeout(() => router.push('/'), 1000);
    } else {
      toast.error('Update failed.', { position: 'top-center' });
    }
  };

  return (
    <>
      <ToastContainer />
      <div className="min-h-screen flex items-center justify-center  text-gray-100 px-4">
        <div className="w-full max-w-xl bg-stone-700 shadow-lg rounded-2xl p-8 space-y-6">
          <h1 className="text-3xl font-bold text-center">Edit Pulse</h1>
          <form onSubmit={handleSubmit} className="space-y-5">
            <div>
              <label htmlFor="title" className="block mb-2">Title</label>
              <input
                id="title" value={title} onChange={e => setTitle(e.target.value)}
                className="w-full px-4 py-3 rounded-lg bg-white text-black"
                required
              />
            </div>

            <div>
              <label htmlFor="content" className="block mb-2">Content</label>
              <textarea
                id="content" value={content} onChange={e => setContent(e.target.value)}
                className="w-full h-32 px-4 py-3 rounded-lg bg-white text-black resize-none"
                required
              />
            </div>

            <button type="submit" disabled={!isUser} className="w-full py-3 rounded-lg bg-green-600 hover:bg-green-700 font-semibold transition disabled:opacity-50">Update Post</button>
          </form>
        </div>
      </div>
    </>
  );
}
