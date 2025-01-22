import { Component , EventEmitter, Output} from '@angular/core';
import { ToDoFormComponent } from "../to-do-form/to-do-form.component";
import { ToDoListComponent } from "../to-do-list/to-do-list.component";

@Component({
  selector: 'app-to-do-wrapper',
  imports: [ToDoFormComponent, ToDoListComponent],
  templateUrl: './to-do-wrapper.component.html',
  styleUrl: './to-do-wrapper.component.css'
})
export class ToDoWrapperComponent {
  list : { task: string; complete: boolean }[] = [];
  
  addTask(taskTitle:string){
    this.list.push({task:taskTitle,complete:false});
  }

  remove(id:number){
    this.list = this.list.filter((_, index) => index !== id);
    }
}
