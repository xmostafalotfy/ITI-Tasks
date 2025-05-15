import { resolve } from "path";
import React from "react";

export default async function Page() {
  const test = await new Promise((resolve) => {
    setTimeout(() => {
      resolve("10 seconds passed");
    }, 10000); 
  });
  const response = await fetch('https://jsonplacehfafafolder.typicode.com/todos');
  const data = await response.json();
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
