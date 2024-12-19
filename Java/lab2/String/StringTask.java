import java.util.regex.Pattern;
import java.util.StringTokenizer;

class StringTask{


  public static  int occurrences(String s,String sub) {
    s = s.toLowerCase();
    String[] parts = s.split(" ");
    int num = 0;
    for (String part:parts){
      if (part.equals(sub)) num++;
    }
      return num;
  }
    
    
  public static  int occurrencne2(String s,String sub) {
    String[] parts = s.split(" ");
    int num = 0;
    for (String part:parts){
      if (part.compareToIgnoreCase(sub) == 0) num++;
    }
        return num;
  }
  
  
  public static  int tOccurrence(String s,String sub) {
    s = s.toLowerCase();
    StringTokenizer T = new StringTokenizer(s, sub);
    return T.countTokens();
  }
  
    
  public static void ip(String s) {
    if (validIp(s)) {

      String[] octets = s.split("\\.");
      for (String octet : octets) {
        System.out.println(octet);
      }
    } else {
        System.out.println("invalid IP");
      }
    }

  public static boolean validIp(String ip) {

    String number = "(\\d{1,2}|1\\d{2}|2[0-4]\\d|25[0-5])";
    String ipRegex = number + "\\." + number + "\\." + number + "\\." + number;


    Pattern p = Pattern.compile(ipRegex);
    return p.matcher(ip).matches();
  }
}

