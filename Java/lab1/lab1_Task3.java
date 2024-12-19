class lab1_Task3{
  public static void main(String arg[]){
    if (arg.length == 2){
    boolean flag = true;
      for (int i =0; i < arg[0].length(); i++){
        if (!Character.isDigit(arg[0].charAt(i))){
          flag = false;

          }
      }
      if (flag == true){
        int test = Integer.parseInt(arg[0]);

          for(int i = 0; i < test ; i++){
            System.out.println(arg[1]);  
          }
      }
        else{
          System.out.println("First input must be positive integer number");
        }
      }
    else{
    System.out.println("Only 2 inputs available. ");
    }
  }
}
