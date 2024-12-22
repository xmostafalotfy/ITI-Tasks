package pkg1;


import java.util.function.Function;

public class RootCal implements Function<Integer[], String >{
  private Double positiveRootCalc(Integer a,Integer b, Integer c){
    Double squareRoot = Math.sqrt(b*b - 4*a*c);
    return (-b + squareRoot )/2*a;
  }

  private Double negativeRootCalc(Integer a,Integer b, Integer c){
    Double squareRoot = Math.sqrt(b*b - 4*a*c);
    return (-b - squareRoot )/2*a;
  }

  @Override
    public String apply(Integer[] arr){
    double result = positiveRootCalc(arr[0],arr[1],arr[2]);
    double result2 = negativeRootCalc(arr[0],arr[1],arr[2]);
    if (Double.isNaN(result) || Double.isNaN(result2)) return "Error : Square Returned Complex";
    return "x1 = "+result+", x2 = "+result2;
    } 
    
}

