
// async function getUser({id}){
//     const url = `https://objectif3w.com/api/users/${id}`;
//     const response = await fetch(url);
//     const json = await response.json();
//     return json;
// }

fetch('https://jsonplaceholder.typicode.com/todos/1')
      .then(response => response.json())
      .then(json => console.log(json))