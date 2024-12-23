package Shapes;

import java.util.*;

class Main{
    public static void main(String[] args) {
        Rectangle R = new Rectangle();
        Circle C = new Circle();
        List<Shape> L = new ArrayList<>();
        L.add(R); L.add(C);
        ShapeTest.gen(L);
    }

}
