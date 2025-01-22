import { Component } from '@angular/core';
import { HeroSectionComponent } from './hero-section/hero-section.component';
import { BioComponent } from './bio/bio.component';
import { SkillsComponent } from './skills/skills.component';
import { ProjectsComponent } from './projects/projects.component';
import { FooterComponent } from './footer/footer.component';

@Component({
  selector: 'app-root',
  imports: [HeroSectionComponent,BioComponent,SkillsComponent,ProjectsComponent,FooterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'angular-portfolio';
}
