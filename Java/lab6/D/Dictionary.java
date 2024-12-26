package D;

import java.util.TreeMap;
import java.util.TreeSet;

public class Dictionary {
    private TreeMap<Character, TreeSet<String>> dic = new TreeMap<>();

    {
        dic.put('W', new TreeSet<String>() {{
            add("war");
            add("wear");
            add("world");
        }});
        dic.put('C', new TreeSet<String>() {{
            add("car");
            add("crash");
            add("careless");
        }});
        dic.put('O', new TreeSet<String>() {{
            add("open");
            add("offer");
            add("organize");
        }});
    }

    public void add(char c, String s) {
        char key = Character.toUpperCase(c);
        if (!dic.containsKey(key)) {
            dic.put(key, new TreeSet<String>() {{
                add(s.toLowerCase());
            }});
        } else {
            dic.get(key).add(s.toLowerCase());
        }
    }

    public boolean search(String s) {
        char key = Character.toUpperCase(s.charAt(0));
        if(dic.containsKey(key))
            if (dic.get(key).contains(s.toLowerCase()))
                return true;
        return false;
    }

    public boolean remove(String s) {
        char key = Character.toUpperCase(s.charAt(0));
        if (dic.containsKey(key)) {
            TreeSet<String> set = dic.get(key);
            if (set != null && set.remove(s.toLowerCase())) {
                return true;
            }
        }
        return false;
    }
    public void display() {
        if (dic.isEmpty()) {
            System.out.println("The dictionary is empty.");
            return;
        }
        System.out.println("Dictionary Contents:");
        for (char entry : dic.keySet()) {
            System.out.println(entry + ": " + dic.get(entry));
        }
    }
}
