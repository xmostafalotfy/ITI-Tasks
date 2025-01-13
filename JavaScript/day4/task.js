// Task 1: Array Method to Calculate Average
Array.prototype.average = function () {
    if (!this.length) throw new Error("Array is empty.");
    if (!this.every(function (item) { return typeof item === 'number'; })) throw new Error("Array must contain only numbers.");
    var sum = this.reduce(function (acc, num) { return acc + num; }, 0);
    return sum / this.length;
};

var arr = [1, 2, 3, 4];
console.log(arr.average()); 

// Task 2a: Default Output for All Objects
Object.prototype.toString = function () {
    return "This is an object";
};

var obj1 = {};
console.log(String(obj1));

// Task 2b: Special Behavior for Specific Object
var obj2 = { message: "This is a message" };
obj2.toString = function () {
    return this.message;
};

console.log(String(obj2));

var obj3 = {};
console.log(String(obj3)); 


// Task 3a: Vehicles and Cars in Transportation App
var Vehicle = (function () {
    var instanceCount = 0;
    var MAX_VEHICLES = 50;

    function Vehicle(type, speed) {
        if (instanceCount >= MAX_VEHICLES) throw new Error("Vehicle limit reached");
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

// Task 3b: Check if an Object is an Instance of Car
function isCar(obj) {
    return {
        isCarUsingInstanceOf: obj instanceof Car,
        isCarUsingConstructorName: obj.constructor === Car
    };
}

var car2 = new Car("SUV", 100);
console.log(isCar(car2)); 
