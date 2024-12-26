package pkg;
import java.util.ArrayList;
import java.util.List;

public class Library
 {
    public List<LibraryItem> Shelfes = new ArrayList<>(); 
    public List<Client> ClientList = new ArrayList<>(); 





public void addItem(LibraryItem item) 
 {
    Shelfes.add(item);
 }


 public LibraryItem findItemById(int id) throws ItemNotFoundException 
 {
    for (LibraryItem item : Shelfes)
    {
        if (item.getId()==id) 
        {
            return item;
        }
    }
    throw new ItemNotFoundException("Item with ID " + id + " not found.");
 }

//  public LibraryItem _findItemById(int id) throws ItemNotFoundException {
//     for (LibraryItem item : Shelfes) {
//         if (item.getId() == id) {
//             return item;
//         }
//     }
//     throw new ItemNotFoundException("Item with ID " + id + " not found.");
// }


 public void displayItems(){
     for (LibraryItem item : Shelfes) 
    {
         System.out.println(item.getItemDetailes() + "\n");
    }
             System.out.println("---------------------------------------------------\n");
 }


 public void updateItem(int id, LibraryItem newItem) throws ItemNotFoundException {
    for (int i = 0; i < Shelfes.size(); i++) {
        if (Shelfes.get(i).getId()==id) {
            Shelfes.set(i, newItem);
            return;
        }
    }
    throw new ItemNotFoundException("Item with ID " + id + " not found.");
}


public void deleteItem(int id) throws ItemNotFoundException {
    LibraryItem item = findItemById(id);
    Shelfes.remove(item);
}

public  void  addClient(int id, String name, String email) 
{
  Client c = new Client(id, name, email);
  ClientList.add(c);
 // return new Client(id, name, email);
}


public void displayClients() 
{
for (Client client : ClientList) 
{
  client.getClientDetails();
}
}


public String deletClient(int Id)
{
String RemoveClient = "" ;
for (Client client : ClientList) 
{
  if(client.id == Id )
  {
    RemoveClient = client.name ;
    ClientList.remove(client);
  }
}
return " Client" + RemoveClient +"is Removed " ;
}


public Client findClientById(int id) throws ItemNotFoundException 
{
 for (Client item : ClientList)
 {

    if (item.id == id) 
    {
         return item;
    }
 }
 throw new ItemNotFoundException("Client with ID " + id + " not found.");
}

public boolean CheckClientsExist(int newId) throws ItemNotFoundException
{
for (Client client : ClientList) 
{

  if(client.id == newId)
  {
    throw new ItemNotFoundException("Client with ID " + newId + " Is Exist.");
  }
}
return true ;
}

public boolean CheckLibraryItemExist(int newId) throws ItemNotFoundException
{
for (LibraryItem item : Shelfes) 
{

  if(item.getId() == newId)
  { 
    throw new ItemNotFoundException("Item with ID " + newId + " Is Exist.");
  }
}
return true ;
}


} /////// end of class

