class Vehicle{

    static num = 0
    type = ''
    speed = 0
    
    constructor(ty,sp){
        if (Vehicle.num == 50) throw Error("Vehicle limit reached");

        this.type = ty
        this.speed = sp
        Vehicle.num++
    }

    start() {
        return "Started"
    }
    end(){
        return "Ended"
    }
}

class Car extends Vehicle{
    constructor(ty,speed){
        super(ty,speed)
    }
}

function isCar(obj){
    return obj instanceof Car;
}

function isCar2(obj){
    return Object.getPrototypeOf(obj) === Car.prototype;
}

// --------------------------------------------------------------------------------------------------------------


const usersTableBody = document.querySelector('#usersTable tbody');

async function fetchAndDisplayData() {
    try {
        const usersResponse = await fetch('https://jsonplaceholder.typicode.com/users');
        const users = await usersResponse.json()

        for (const user of users) {
            const postsResponse = await fetch(`https://jsonplaceholder.typicode.com/posts?userId=${user.id}`)
            const posts = await postsResponse.json()

            const postsInfo = await Promise.all(posts.map(async (post) => {
                const commentsResponse = await fetch(`https://jsonplaceholder.typicode.com/comments?postId=${post.id}`)
                const comments = await commentsResponse.json()
            
                const commentsList = comments.map((comment) => `<li>${comment.body}</li>`).join("")
            
                return `<h3>${post.title}</h3><ul>${commentsList}</ul>`
            }));
            

            const row = document.createElement('tr')
            row.innerHTML = `
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.company.name}</td>
                <td>Lat: ${user.address.geo.lat}, Lng: ${user.address.geo.lng}</td>
                <td>
                    ${postsInfo.join("")}   
                </td>
            `;
            usersTableBody.appendChild(row)
        }
    } catch (error) {
        console.error(error)
    }
}

fetchAndDisplayData();
