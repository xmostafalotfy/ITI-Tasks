import java.util.function.Function;

class Fh implements Function<Number, Double> {
    @Override
    public Double apply(Number t) {
        return ((t.doubleValue() * 9) / 5) + 32;  
    }
}

public class Degree {
    public static void main(String[] args) {
        Function<Number, Double> test = new Fh();

        System.out.println(test.apply(12124214)); // Integer input
        System.out.println(test.apply(25.0f));    // Float input
        System.out.println(test.apply(98.6));     // Double input
    }
}
