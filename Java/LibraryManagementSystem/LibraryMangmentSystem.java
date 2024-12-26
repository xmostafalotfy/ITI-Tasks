import pkg.Book;
import pkg.Client;
import pkg.ItemNotFoundException;
import pkg.Library;
import pkg.LibraryItem;
import pkg.Magazine;
import java.util.Scanner;
import java.lang.Runtime;


public class LibraryMangmentSystem {

    public static void MainMenu()
    {
        System.out.println("\nLibrary Management System");
        System.out.println("_________________________\n");

        System.out.println("___Items___");
        System.out.println("1. Add Item");
        System.out.println("2. Retrieve Item");
        System.out.println("3. Display ");
        System.out.println("4. Remove Item\n");

        System.out.println("____Client____");
        System.out.println("5. Add Client");
        System.out.println("6. Retrieve Client");
        System.out.println("7. Display Clients");
        System.out.println("8. Remove Client");
        System.out.println("9. Borrow");
        System.out.println("10. Return");
        System.out.println("11. Exit\n");
        System.out.print("Enter your choice: ");
    }

    public static void main(String[] args) 
    {
        Library lib = new Library();
        Scanner scanner = new Scanner(System.in);

        lib.addItem(new Book(1, "No Way!", "jhon"));
        lib.ClientList.add(new Client(1, "Mostafa", "Mostafa@gmail.com"));

        while (true) {
            MainMenu();

            int choice = scanner.nextInt();
            scanner.nextLine(); 
           
            try {
                switch (choice) {
                    case 1:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();
                        System.out.print("Enter item type (1 for Book, 2 for Magazine): ");
                        int itemType = scanner.nextInt();
                        if(!(itemType == 1 || itemType == 2)){System.out.println("Wrong Input.");break;}
                        scanner.nextLine();
                        System.out.print("Enter ID: ");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int id = scanner.nextInt();
                        scanner.nextLine();
                        lib.CheckLibraryItemExist(id);
                        System.out.print("Enter Title: ");
                        String title = scanner.nextLine();
                        if (itemType == 1) {
                            System.out.print("Enter Author: ");
                            String author = scanner.nextLine();
                            lib.addItem(new Book(id, title, author));
                        } else if (itemType == 2) {
                            System.out.print("Enter Issue: ");
                            String issue = scanner.nextLine();
                            lib.addItem(new Magazine(id, title, issue));
                        } 
                        break;
                    case 2:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();
                        System.out.print("Enter item ID: ");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int retrieveId = scanner.nextInt();
                        scanner.nextLine();
                        LibraryItem item = lib.findItemById(retrieveId);
                        System.out.println("Item Details: " + item.getItemDetailes());
                        break;
                    case 3:
                            new ProcessBuilder("clear").inheritIO().start().waitFor();
                            lib.displayItems();
                        
                        break;
                    case 4:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();
                        
                        lib.displayItems();
                        System.out.print("Enter item ID to remove: ");
                        System.out.println("");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int removeId = scanner.nextInt();
                        scanner.nextLine();
                        lib.deleteItem(removeId);
                        break;
                    case 5:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();

                        System.out.print("Enter Client ID: ");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int clientId = scanner.nextInt();
                        scanner.nextLine();
                         lib.CheckClientsExist(clientId);
                        System.out.print("Enter Name: ");
                        String name = scanner.nextLine();
                        System.out.print("Enter Email: ");
                        String email = scanner.nextLine();
                        lib.ClientList.add(new Client(clientId, name, email));
                        break;
                    case 6:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();

                        System.out.print("Enter Client ID: ");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int retrieveClientId = scanner.nextInt();
                        scanner.nextLine();
                        Client SearchClient = lib.findClientById(retrieveClientId);
                 

                        SearchClient.getClientDetails();
                        break;
                    case 7:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();

                        if (lib.ClientList.isEmpty()) {
                            System.out.println("No Clients!");
                        } else {
                            lib.ClientList.forEach(c -> c.getClientDetails());
                        }
                        break;
                    case 8:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();

                        if (lib.ClientList.isEmpty()) {
                            System.out.println("No Clients to remove!");
                            break;
                        } else {
                            lib.ClientList.forEach(c -> c.getClientDetails());
                        }
                        System.out.println("");
                        System.out.print("Enter Client ID to remove: ");
                        if (!scanner.hasNextInt()) {
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int removeClientId = scanner.nextInt();
                        scanner.nextLine();
                        Client clientToRemove = lib.ClientList.stream()
                                .filter(c -> c.id == removeClientId)
                                .findFirst()
                                .orElseThrow(() -> new ItemNotFoundException("Client with ID " + removeClientId + " not found"));
                                lib.ClientList.remove(clientToRemove);
                        System.out.println("Client with ID " + removeClientId + " removed successfully.");
                        break;
                    case 9:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();

                        System.out.print("Enter Client ID to Borrow: ");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        int clientIdToBorrow = scanner.nextInt();
                        scanner.nextLine();                
                        Client clientObjBorrow = lib.findClientById(clientIdToBorrow);                
                        lib.displayItems();
                        System.out.print("Enter item ID: ");
                        int itemObjId = scanner.nextInt();
                        scanner.nextLine();
                
                        LibraryItem itemObj = lib.findItemById(itemObjId);                
                        if(itemObj.Stock == false)
                        {
                            System.out.println("Cant Borrow Item!");
                        }else
                        {
                            clientObjBorrow.addBorrowedItem(itemObj);
                            itemObj.Stock = false;
                            System.out.println("Item borrowed successfully!");
                        }
                        
                        break;

                    case 10:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();
                        
                        System.out.print("Enter Client ID to Return : ");
                        if (!scanner.hasNextInt()) { 
                            throw new IllegalArgumentException("ID must be an integer!");
                        }
                        
                        int clientIdToReturn = scanner.nextInt();
                        scanner.nextLine();                
                        Client clientObjReturn = lib.findClientById(clientIdToReturn);  
                        if (clientObjReturn.ClientBorrowList.isEmpty()){ System.out.println("This Client has no borrows ."); break;}
                        clientObjReturn.displayBorrowedItems();
                        System.out.print("Enter item id to return : ");
                        int objIdToReturn = scanner.nextInt();
                        scanner.nextLine();
                        clientObjReturn.returnItem (objIdToReturn);              
                        System.out.println("Item returned successfully! ");

                        break;
                    case 11:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();
                        System.out.println("Exiting the system. Goodbye!");
                        scanner.close();
                        return;
                    default:
                        new ProcessBuilder("clear").inheritIO().start().waitFor();
                        System.out.println("Invalid choice. Try again.");
                        System.out.println("--------------------------\n");


                }
            } catch (ItemNotFoundException e) {
                System.out.println(e.getMessage());
            }catch (IllegalArgumentException e) {
                System.out.println("Error: " + e.getMessage());
                scanner.nextLine(); 
            }
             catch (Exception e) {
                System.out.println("Error: " + e.getMessage());
            }
        }

    }
}