package pkg;

public class Book extends LibraryItem {

 public String author ;
  public Book(int id, String title, String author)
  {
    this.id = id;
    this.title = title;
    this.author = author ;
  }


    @Override
    public String getItemDetailes() {
        return "Book ->\tID: " + getId() + ", Title: " + getTitle() + ", Author : " + author + "." ;
    }
    

}