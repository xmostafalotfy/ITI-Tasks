'use client'

import React, { useEffect, useState } from "react";


export default function Page() {

  const [data, setData] = useState([])
  useEffect(() => {
    (async function () {
        await fetch("https://jsonplaceholder.typicode.com/todos")
      .then((res) => res.json())
      .then((data) => {
        setData(data);
      });
    })();

  }, []);


  return (
    <div>
      <h2>Todo Items</h2>
      {data.map((elem) => {
        return (
          <div key={elem.id}>
            <p>User ID: {elem.userId}</p>
            <p>ID: {elem.id}</p>
            <p>Title: {elem.title}</p>
          </div>
        );
      })}
    </div>
  );
}
