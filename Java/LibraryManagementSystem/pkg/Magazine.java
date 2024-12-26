package pkg;

public class Magazine extends LibraryItem{
 public String issue ;
   public Magazine(int id , String title , String issue )
   {
    this.id = id ;
    this.title = title;
    this.issue = issue;
   }


    @Override
    public String getItemDetailes() {
        return "Magazine ->\tID: " + getId() + ", Title: " + getTitle()  + ", Issue: " + issue+".";
    }

    
}
