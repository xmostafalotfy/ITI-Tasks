import { Component } from '@angular/core';
import { ToDoWrapperComponent } from "./to-do-wrapper/to-do-wrapper.component";

@Component({
  selector: 'app-root',
  imports: [ ToDoWrapperComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'to-do-list';
}
