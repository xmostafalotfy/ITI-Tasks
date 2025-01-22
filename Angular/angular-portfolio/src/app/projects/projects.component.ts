import { Component } from '@angular/core';

@Component({
  selector: 'app-projects',
  imports: [],
  templateUrl: './projects.component.html',
  styleUrl: './projects.component.css'
})
export class ProjectsComponent {
  projects: { title: string; desc: string }[] = [
    { title: 'Project1', desc: 'With supporting text below as a natural lead-in to additional content.' },
    { title: 'Project2', desc: 'With supporting text below as a natural lead-in to additional content.' },
    { title: 'Project3', desc: 'With supporting text below as a natural lead-in to additional content.' },
    { title: 'Project4', desc: 'With supporting text below as a natural lead-in to additional content.' },
    { title: 'Project5', desc: 'With supporting text below as a natural lead-in to additional content.' },
    { title: 'Project6', desc: 'With supporting text below as a natural lead-in to additional content.' }
  ];

}
