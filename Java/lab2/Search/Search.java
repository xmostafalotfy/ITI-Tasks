import java.lang.Math;

class Search{
  public static void linear(){

    int arr[] = new int[1000];
    for(int i = 0; i<1000; i++){
      arr[i] = (int) (Math.random()*1000); 
    }
    int max = arr[0], min = arr[0];
    long linearTimeMin = System.nanoTime();
    for(int i = 0; i<arr.length; i++){
      if (arr[i] < min) min = arr[i];
    }
    linearTimeMin = System.nanoTime() - linearTimeMin;
    
    long linearTimeMax = System.nanoTime();
      for(int i = 0; i<arr.length; i++){
        if (arr[i] > max) max = arr[i];
    }
    linearTimeMax = System.nanoTime() - linearTimeMax;
    System.out.println("Linear Search");
    System.out.println("Min num : "+ min +" in Nano Sec.: "+ linearTimeMin);
    System.out.println("Max num : "+ max +" in Nano Sec.: "+ linearTimeMax);
    System.out.println("-------------------------------------------");
    
  }
  public static void binary(){

    int arr2[] = new int[1000];
    for(int i = 0; i<1000; i++){
      arr2[i] = i; 
    }

    int maxNum = arr2[999], minNum = arr2[0];
    int start = 0, end = 999;
    int mid;
    long binaryTimeMin = System.nanoTime();
    
    do {
        mid = ((end - start) / 2) + start;
        if (arr2[mid] == maxNum ) break;
        else if (arr2[mid] > maxNum) end = mid - 1;
        else start = mid + 1;
    } while(start<=end);
    
    binaryTimeMin = System.nanoTime() - binaryTimeMin;
    start = 0;
    end = 999;
    long binaryTimeMax = System.nanoTime();
    
    do {
        mid = ((end - start) / 2) + start;
        if (arr2[mid] == minNum ) break;
        else if (arr2[mid] > minNum) end = mid - 1;
        else start = mid + 1;
    }while(start<=end);
    binaryTimeMax = System.nanoTime() - binaryTimeMax;
    
    System.out.println("Binary Search");
    System.out.println("First num : "+ minNum +" in Nano Sec.: "+ binaryTimeMin);
    System.out.println("Last num : "+ maxNum +" in Nano Sec.: "+ binaryTimeMax);
    System.out.println("-------------------------------------------");
    
  }
}
