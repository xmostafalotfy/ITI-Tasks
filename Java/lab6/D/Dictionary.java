package D;

import java.util.TreeMap;
import java.util.TreeSet;

public class Dictionary {
    private TreeMap<Character, TreeSet<String>> dictionary = new TreeMap<>();

    {
        dictionary.put('W', new TreeSet<String>() {{
            add("war");
            add("wear");
            add("world");
        }});
        dictionary.put('C', new TreeSet<String>() {{
            add("car");
            add("crash");
            add("careless");
        }});
        dictionary.put('O', new TreeSet<String>() {{
            add("open");
            add("offer");
            add("organize");
        }});
    }

    public void add(char c, String s) {
        char key = Character.toUpperCase(c);
        if (!dictionary.containsKey(key)) {
            dictionary.put(key, new TreeSet<String>() {{
                add(s.toLowerCase());
            }});
        } else {
            dictionary.get(key).add(s.toLowerCase());
        }
    }

    public boolean search(String s) {
        char key = Character.toUpperCase(s.charAt(0));
        if(dictionary.containsKey(key))
            if (dictionary.get(key).contains(s.toLowerCase()))
                return true;
        return false;
    }

    public boolean remove(String s) {
        char key = Character.toUpperCase(s.charAt(0));
        if (dictionary.containsKey(key)) {
            TreeSet<String> set = dictionary.get(key);
            if (set != null && set.remove(s.toLowerCase())) {
                return true;
            }
        }
        return false;
    }
    public void display() {
        if (dictionary.isEmpty()) {
            System.out.println("The dictionary is empty.");
            return;
        }
        System.out.println("Dictionary Contents:");
        for (char entry : dictionary.keySet()) {
            System.out.println(entry + ": " + dictionary.get(entry));
        }
    }
}
