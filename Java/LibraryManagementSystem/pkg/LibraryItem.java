package pkg;

public abstract class LibraryItem
{
 protected int id ;
 protected String title ;
 public boolean Stock = true;

 public int getId()  {
    return id;
}

public String getTitle() {
    return title;
}


 abstract public String getItemDetailes();

}


