class MethodsClass {
    public static int numSum(int num1,int num2)throws NegativeNum{
        if(num1 < 0 || num2 < 0) throw new NegativeNum();
        return num1+num2;
    }
    public static int numMul(int num1,int num2)throws NegativeNum{
        if(num1 < 0 || num2 < 0) throw new NegativeNum();
        return num1*num2;
    }
    public static int numDiv(int num1,int num2)throws NegativeNum, ArithmeticException{
        if(num1 < 0 || num2 < 0) throw new NegativeNum();
        if (num2 == 0) throw new ArithmeticException();
        return num1/num2;
    }

}
