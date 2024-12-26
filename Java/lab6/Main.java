import java.util.Scanner;
import D.Dictionary;

public class Main {
    public static void main(String[] args) {
        Dictionary dictionary = new Dictionary();
        Scanner scanner = new Scanner(System.in);
        boolean exit = false;

        System.out.println("Welcome to My Dictionary!");
        System.out.println("1. Add a word");
        System.out.println("2. Search for a word");
        System.out.println("3. Remove a word");
        System.out.println("4. Display Dicitonary");
        System.out.println("5. Exit");

        while (!exit) {
            System.out.print("\nChoose an operation (1-5): ");
            int choice = scanner.nextInt();
            scanner.nextLine(); 

            switch (choice) {
                case 1:
                    System.out.print("Enter the word to add: ");
                    String wordToAdd = scanner.nextLine();
                    dictionary.add(wordToAdd.charAt(0), wordToAdd);
                    System.out.println("Word added successfully!");
                    break;

                case 2:
                    System.out.print("Enter the word to search: ");
                    String wordToSearch = scanner.nextLine();
                    if (dictionary.search(wordToSearch)) {
                        System.out.println("The word '" + wordToSearch + "' exists in the dictionary.");
                    } else {
                        System.out.println("The word '" + wordToSearch + "' does not exist.");
                    }
                    break;

                case 3:
                    System.out.print("Enter the word to remove: ");
                    String wordToRemove = scanner.nextLine();
                    if (dictionary.remove(wordToRemove)) {
                        System.out.println("The word '" + wordToRemove + "' was removed successfully.");
                    } else {
                        System.out.println("The word '" + wordToRemove + "' does not exist in the dictionary.");
                    }
                    break;

                case 4:
                    dictionary.display();
                    break;
                case 5:
                    exit = true;
                    System.out.println("Exiting the program. Goodbye!");
                    break;


                default:
                    System.out.println("Invalid choice. Please choose between 1 and 4.");
                    break;
            }
        }

        scanner.close();
    }
}


