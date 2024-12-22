
interface Function<?, R> {
    public R apply(?);
}


class Fh implements Function<? extends Number, Double> {
    @Override
    public Double apply(Number t) {
        return ((t.doubleValue() * 9) / 5) + 32;  
    }
}

public class Degree {
    public static void main(String[] args) {

        Function<? extends Number, Double> test = new Fh();
        

        System.out.println(test.apply(12124214)); 

        System.out.println(test.apply(25.0f));  
        
        System.out.println(test.apply(98.6));   
    }
}

