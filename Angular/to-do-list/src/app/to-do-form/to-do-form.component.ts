import { Component , Output , EventEmitter } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-to-do-form',
  imports: [FormsModule],
  templateUrl: './to-do-form.component.html',
  styleUrl: './to-do-form.component.css'
})
export class ToDoFormComponent {

  @Output() sendTaskToParent = new EventEmitter<string>();
  task : string = "";
  add(){
    if(this.task !== ""){ 
      this.sendTaskToParent.emit(this.task);
      this.task = "";
    }
    else alert("Enter a Task !");
  }

}
