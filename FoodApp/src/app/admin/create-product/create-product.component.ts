import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-product',
  standalone: true,
  imports: [CommonModule, FormsModule, HttpClientModule],
  templateUrl: './create-product.component.html',
  styleUrl: './create-product.component.css'
})
export class CreateProductComponent {
  constructor(public router: Router, public http: HttpClient){

  }
public product_name: string=''
public product_price: string=''
public product_category: string=''
public product_desc: string=''
public product_img: string=''

public Products: any= [];
public derivedData:any;



public productObj={
  name: this.product_name,
  price: this.product_price,
  category: this.product_category,
  desc: this.product_desc,
  image: this.product_img

}
handleFileInput(event: any) {
  this.productObj.image = event.target.files[0];
}

ngOnInit(){
     this.http.get('http://localhost:8000/firstApp/admin/products.php').subscribe((infoo:any)=>{
      if(infoo){
        this.derivedData= infoo
         
   
       console.log(this.derivedData);
       
       
      }
      else{
       console.error('Error fetching user data:',);
      }
   
   });

}

createProduct(){

  if(this.productObj.name && this.productObj.price && this.productObj.desc && this.productObj.image && this.productObj.category){
    const formData = new FormData();
    formData.append('name', this.productObj.name);
    formData.append('price', this.productObj.price);
    formData.append('category', this.productObj.category);
    formData.append('desc', this.productObj.desc);
    formData.append('image', this.productObj.image);
    // const data={
    //   name: this.productObj.name,
    //   price: this.productObj.price,
    //   category: this.productObj.category,
    //   desc: this.productObj.desc,
    //   image: this.productObj.image
    // }


    this.http.post('http://localhost:8000/firstApp/admin/createProduct.php', formData).subscribe((response:any)=>{

      // this.message= response.message;
      // this.UserToken= response.token;
      // this.UserEmail= response.email;
  
      console.log(response);
      // if(response.message === "Login Successful" ){
      //   alert('User Logged in');
      //   // console.log(this.UserToken);
      //   localStorage.setItem('myToken', JSON.stringify(this.UserToken));
      //   localStorage.setItem('myEmail', JSON.stringify(this.UserEmail));
      //   this.router.navigate(['home'])
      // }

    }, error=>{
      console.log(error);
      
    });
  }





  this.Products.push(this.productObj);
  console.log(this.Products);
}
}
