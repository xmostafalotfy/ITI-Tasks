// Task 1
Array.prototype.average = function () {
    if (!this.length) throw new Error("Array is empty.");
    if (!this.every( (item) =>  typeof item == 'number' )) throw new Error("Array must contain only numbers.");
    var sum = this.reduce( (acc, num)  => acc + num , 0);
    return sum / this.length;
};

var arr = [1, 2, 3, 4];
console.log(arr.average()); 

// Task 2 a
Object.prototype.toString = function () {
    return "This is an object";
};

var obj1 = {};
console.log(String(obj1));

// Task 2 b
var obj2 = { message: "This is a message" };
obj2.toString = function () {
    return this.message;
};

console.log(String(obj2));

var obj3 = {};
console.log(String(obj3)); 


// Task 3 a
var Vehicle = (function () {
    var instanceount = 0;
    function Vehicle(type, speed) {
        if (instanceCount == 50) throw new Error("Vehicle limit reached");
        this.type = type;
        this.speed = speed;
        instanceCount++;
    }

    Vehicle.prototype.start = function () {};
    Vehicle.prototype.stop = function () {};

    return Vehicle;
})();

function Car(type, speed) {
    Vehicle.call(this, type, speed);
}

Car.prototype = Object.create(Vehicle.prototype);
Car.prototype.constructor = Car;

Car.prototype.drive = function () {};

var car1 = new Car("Sedan", 120);
car1.start();
car1.drive();
car1.stop();

// Task 3 b
function isCar1(obj) {
    return obj instanceof Car
}

function isCar2(obj) {
    return obj.constructor === Car
}


var car2 = new Car("SUV", 100);
console.log(isCar(car2)); 
console.log(isCar2(car2)); 



