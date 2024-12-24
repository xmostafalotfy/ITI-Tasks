interface AlphaStringI {
    boolean test(String s1);
}

class AlphaString {
    public static void main(String[] args) {
        AlphaStringI a = (s1) -> { char[] chars1 = s1.toCharArray();
            for(char x : chars1){
                if (!Character.isLetter(x)) return false;
            }
            return true;
        };
        System.out.println(isAlpha("HelloWorld",a)); 
        System.out.println(isAlpha("Hello123",a));
        System.out.println(isAlpha("HiThere!",a));
    }

    static boolean isAlpha(String name, AlphaStringI alpha) {

        return alpha.test(name);
    }

}
