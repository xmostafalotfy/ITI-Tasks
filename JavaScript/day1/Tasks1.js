// Palindrome
function palindrome(str){
    if (typeof str != "string"){ throw Error("Only strings available")}
    for (i = 0; i < str.length / 2; i++){
        if (str.charAt(i) != str.charAt(str.length - i - 1)) return false;
    }
    return true
}

//                 OR                  //
function palindrome2(str){
    if (typeof str != "string"){ throw Error("Only strings available")}
    return str == str.split("").reverse().join("")
}

try{
    console.log(palindrome2("test"))
    console.log(palindrome2("racecar"))
    console.log(palindrome2(123))
}catch(e){
    console.log("Error : " + e)
}

// ---------------------------------------------------------------------------------------------------
// Price Discount

function discountCalc(price,dis){
    if (typeof price != 'number' || typeof dis != 'number') {
         throw Error("only numbers are available")}
    if (price < 0) {throw Error("Price Must be positive !")}
    if(!(dis >= 0 && dis <= 100)) {throw Error("Discount must be in range 1 to 100 !")}

    return price * dis / 100
}

// --------------------------------------------------------------------------------------------------

// Array of Favorite Movies
var myFav = ["interstellar","inception","arrival","The Prestige"]
var myFav2 = myFav.slice() 
myFav[2] = "Bullet Train"
console.log(myFav.pop())
console.log(myFav.slice(-1)[0])
console.log(myFav[myFav.length-1])

//--------------------------------------------------------------------------------------------------

// Longest Word

function longestWord(str){
    if (typeof str != "string"){ throw Error("Only strings available")}
    str = str.split(" ")
    var max = '';
    for (i = 0; i<str.length; i++){
        if (str[i].length > max.length){max = str[i]}
    }
    return max
}

// -----------------------------------------------------------------------------------------------

// Prompts

var na = prompt("Enter Your Name : ")
var degrees = prompt("Enter Your Degrees like (10,10,10,10) : ")
var degreesPattern = /^(100|[1-9]?\d)(,(100|[1-9]?\d))*$/;

while (!degreesPattern.test(degrees)) {
    alert("Invalid input. Please enter degrees in the correct format, In range 0 - 100, Correct format : 10,20,40");
    degrees = prompt("Enter Your Degrees : ");
}

console.log("Hello " + na +"\n")
degrees = degrees.split(",")
console.log("Subjects "+"\t Degrees")
console.log("------------------------------")


for(i=0;i<degrees.length;i++){
    console.log("Subject "+(i+1)+"\t "+degrees[i])
    console.log("------------------------------")
}


// -------------------------------------------------------------------------------------------------
// Transfer Array

var orders = [
    {
      orderId: 'ORD001',
      customer: 'John Doe',
      items: 'item1:2,item2:1,item3:5',
      orderDate: '2023-12-01',
      deliveryDate: '2023-12-05',
      deliveryAddress: '123, Main Street, Springfield, USA',
    },
    {
      orderId: 'ORD002',
      customer: 'Jane Smith',
      items: 'itemA:3,itemB:4',
      orderDate: '2023-11-15',
      deliveryDate: '2023-11-20',
      deliveryAddress: 'Flat 4B, Elmwood Apartments, New York, USA',
    },
    {
      orderId: 'ORD003',
      customer: 'Alice Johnson',
      items: 'itemX:1',
      orderDate: '2023-10-10',
      deliveryDate: '2023-10-15',
      deliveryAddress: '456, Pine Lane, Denver, USA',
    }
  ];

var formattedOrders = []

for( i = 0; i < orders.length; i++){
    orderDetails = {}
    orderDetails.orderId = orders[i].orderId
    orderDetails.customer = orders[i].customer
    itemsNum = orders[i].items.split(":").slice(1)
    orderDetails.totalItems = 0
    for(j = 0; j < itemsNum.length; j++){ orderDetails.totalItems += Number(itemsNum[j].charAt(0)) }
    orderDetails.orderDate = orders[i].orderDate
    orderDetails.deliveryDate = orders[i].deliveryDate
    orderDetails.deliveryDuration = Number((new Date(orderDetails.deliveryDate)- new Date(orderDetails.orderDate)))/(1000*60*60*24)
    itemsAddress = orders[i].deliveryAddress.split(",")
    orderDetails.deliveryCountry = itemsAddress[3]
    orderDetails.deliveryCity = itemsAddress[2]
    orderDetails.deliveryStreet = itemsAddress[1]
    orderDetails.buildingNumber = itemsAddress[0]
    formattedOrders.push(orderDetails)
}

console.log(formattedOrders)