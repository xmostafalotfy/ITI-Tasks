import java.util.InputMismatchException;
import java.util.Scanner;


public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        while(true){
        try {
            System.out.print("Enter first number for summation: ");
            int num1 = input.nextInt();
            System.out.print("Enter second number for summation: ");
            int num2 = input.nextInt();
            System.out.println("Sum: " + MethodsClass.numSum(num1, num2));

            System.out.print("Enter numerator for division: ");
            int num3 = input.nextInt();
            System.out.print("Enter denominator for division: ");
            int num4 = input.nextInt();
            System.out.println("Division: " + MethodsClass.numDiv(num3, num4));

            System.out.print("Enter first number for multiplication: ");
            int num5 = input.nextInt();
            System.out.print("Enter second number for multiplication: ");
            int num6 = input.nextInt();
            System.out.println("Product: " + MethodsClass.numMul(num5, num6));
            
            break;
        } catch (NegativeNum e) {
            System.out.println("Error: " + e.getMessage());
            input.nextLine();
        } catch (ArithmeticException e) {
            System.out.println("Error: Can't Divide by Zero.");
            input.nextLine();

        } catch (InputMismatchException e) {
            System.out.println("Error: Invalid input. Please enter an integer.");
            input.nextLine();

    
    }
    }
    input.close();
}
}
