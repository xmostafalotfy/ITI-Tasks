package pkg;

import java.util.ArrayList;
import java.util.List;

public class Client {

 public int id ;
 public String name ;
 public String email ;
 public List<LibraryItem> ClientBorrowList = new ArrayList<>();

 public String returnItem (int Id) throws ItemNotFoundException
 {
 for (LibraryItem item : ClientBorrowList) {
   if(item.getId() == Id )
   {
     String RemoveItem = item.getTitle() ;
     ClientBorrowList.remove(item);
     item.Stock = true;
     return " Client" + RemoveItem +"is Removed " ;   
    }
 }
 throw new ItemNotFoundException("item with ID " + id + " not found.");
 }
 
 public void displayBorrowedItems() 
 {
     for (LibraryItem item : ClientBorrowList) 
    {
         System.out.println(item.getItemDetailes());
         System.out.println("");
    }
    System.out.println("--------------------------------------------\n");
 }

  public void addBorrowedItem(LibraryItem item) 
  {
   ClientBorrowList.add(item);
  }

  public Client(int id , String name , String email )
  {
    this.id = id ;
    this.name = name ;
    this.email = email ;
    ClientBorrowList = new ArrayList<>();  }

  public void getClientDetails()
  {
    System.out.println("ID = "+ id +", Name = "+ name +", Email = "+email + ".");
    System.out.println("");
  }
}
