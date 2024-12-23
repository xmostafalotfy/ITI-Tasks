package Shapes;
import java.util.*;

abstract class Shape {
    
    abstract public void draw(); 

}

class Circle extends Shape {
    @Override
    public void draw() {
        System.out.println("Drawing a circle");
    }
    
}

class Rectangle extends Shape {
    @Override
    public void draw() {
        System.out.println("Drawing a rectangle");
    }
    
}

class ShapeTest {
    public static <T extends Shape> void gen(List<T> shape) {
        for (T t : shape) {
            t.draw();
        }
    }
}
