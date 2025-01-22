import { Component, EventEmitter, Input, Output, Renderer2 } from '@angular/core';

@Component({
  selector: 'app-to-do-list',
  imports: [],
  templateUrl: './to-do-list.component.html',
  styleUrl: './to-do-list.component.css'
})
export class ToDoListComponent {
  @Input() tasks : any ;
  @Output() removeElement = new EventEmitter<number>();

  complete(id:number){
    if (this.tasks[id].complete) this.tasks[id].complete = false;

    else this.tasks[id].complete = true;
    console.log(this.tasks[id].complete);
  }

  del(id:number){
      this.removeElement.emit(id);  
  }
}
