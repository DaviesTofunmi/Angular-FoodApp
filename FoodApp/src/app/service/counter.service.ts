import { Injectable } from '@angular/core';
import { Observable, BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CounterService {
 
  public num: BehaviorSubject<number>= new BehaviorSubject<number> (0)
  public counter: Observable<number>= this.num.asObservable()
  // private products: BehaviorSubject<Array[]>= new BehaviorSubject<Array>[]

  constructor() { }
  increase(): void{
    this.num.next(this.num.value+1)
  }
  decrease(): void{
    if(this.num.value > 0){
      this.num.next(this.num.value-1)
    }
   
  }
}
