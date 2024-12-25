@FunctionalInterface
interface TwoStringC {
    boolean test(String s1, String s2);
}

class Better {
    public static String betterString(String s1, String s2, TwoStringC predicate) {
        return predicate.test(s1, s2) ? s1 : s2;
    }

    public static void main(String[] args) {
        String string1 = "better";
        String string2 = "aaaaaaaahhhhhhhhhh";

        String result = betterString(string1, string2, (s1, s2) -> s1.equals("better"));
        System.out.println("Better String: " + result);
    }
}
