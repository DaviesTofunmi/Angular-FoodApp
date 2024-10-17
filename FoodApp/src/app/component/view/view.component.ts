import { Component } from '@angular/core';
import { FoodCardComponent } from '../food-card/food-card.component';
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-view',
  standalone: true,
  imports: [FoodCardComponent],
  templateUrl: './view.component.html',
  styleUrl: './view.component.css'
})
export class ViewComponent {
  constructor(public act: ActivatedRoute){}
  public id: number=0;
  public myparams: any;


  ngOnInit(){
    this.act.snapshot.params['id'];
    console.log(this.id);
    
  }
  

}
