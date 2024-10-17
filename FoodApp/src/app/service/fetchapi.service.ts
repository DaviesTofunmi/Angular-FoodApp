import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class FetchapiService {
  foodItems: Array<{ 
    name: string 
    price: number
    desc: string
   


  }> =[
    {
      name: "yam",
      price: 29,
      desc: "a good food   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit. "
    },
    {
      name: "bread",
      price: 340,
      desc: "a bad food  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit. "
    },
    {
      name: "rice",
      price: 140,
      desc: "a bad food  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit. "
    },
    {
      name: "burger",
      price: 640,
      desc: "a bad food  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit. "
    },
    
  ];

  
  

  constructor() { }
}
