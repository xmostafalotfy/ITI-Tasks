import { Component } from '@angular/core';
import data from '../../assets/products.json'
import { JData } from '../type/j-data';
import { Router } from '@angular/router';
@Component({
  selector: 'app-list',
  imports: [],
  templateUrl: './list.component.html',
  styleUrl: './list.component.css'
})
export class ListComponent {
  dataList: JData[] = data.products as JData[];
  Math = Math;
  constructor(private router:Router){}

  goToDetails(id:number){
    this.router.navigate([`/details/${id}`])
  }
}
