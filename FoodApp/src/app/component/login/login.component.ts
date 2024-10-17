import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, FormsModule, HttpClientModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  constructor(public router: Router, public http: HttpClient){

  }
  public derivedData: Array<{ email: string, password: string}>= []
  public loginObj: any={};
  public message: any;
  public route: any;
  public UserToken: any
  public UserEmail: any


  ngOnInit(){

  //   this.http.get('http://localhost:8000/firstApp/components/users.php').subscribe((infoo:any)=>{
  //     if(infoo){
  //       this.derivedData= infoo
         
   
  //      console.log(this.derivedData);
       
       
  //     }
  //     else{
  //      console.error('Error fetching user data:',);
  //     }
   
  //  });


  }
 

  onLogin(){
    if(this.loginObj.email && this.loginObj.password){


      // const formData = new FormData()
      // formData.append("email" , this.loginObj.email)
      // formData.append("password", this.loginObj.password)

        const data = {
       
          email: this.loginObj.email,
          password: this.loginObj.password
      };
    
        this.http.post('http://localhost:8000/firstApp/components/newLogin.php', data).subscribe((response:any)=>{

          this.message= response.message;
          this.UserToken= response.token;
          this.UserEmail= response.email;
      
          console.log(response);
          if(response.message === "Login Successful" ){
            alert('User Logged in');
            // console.log(this.UserToken);
            localStorage.setItem('myToken', JSON.stringify(this.UserToken));
            localStorage.setItem('myEmail', JSON.stringify(this.UserEmail));
            this.router.navigate(['home'])
          }

        }, error=>{
          console.log(error);
          
        });
        








      // const isUserExist= this.derivedData.find(element=> element.email == this.loginObj.email && element.password == this.loginObj.password);
      // if(isUserExist){
      //   alert('User Logged in');
      //   // localStorage.setItem("currentUser", JSON.stringify(isUserExist))
      //   // this.router.navigate(['todo'])
      // }
      // else{
      //   alert('User not found');
    
        
      // }
    } else{
      alert('Please enter all the details');
    }
   

  }

  }


