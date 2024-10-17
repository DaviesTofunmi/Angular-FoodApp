import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-admin-login',
  standalone: true,
  imports: [CommonModule, FormsModule, HttpClientModule],
  templateUrl: './admin-login.component.html',
  styleUrl: './admin-login.component.css'
})
export class AdminLoginComponent {
  constructor(public router: Router, public http: HttpClient){

  }
  public adminLoginObj:any={}
  public message: any;

  public UserToken: any
  public UserEmail: any

  onAdminLogin(){
    if(this.adminLoginObj.email && this.adminLoginObj.password){
      const data = {
       
        email: this.adminLoginObj.email,
        password: this.adminLoginObj.password
    };

    this.http.post('http://localhost:8000/firstApp/admin/adminLogin.php', data).subscribe((response:any)=>{

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


    }


  }

}
