import { Injectable } from '@angular/core';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';
import { ILoginDetails } from '../../../src/app/Auth/login/Model/loginInterface';
import { IUserDashboardDetails } from '../Dashboard/user-dashboard/Model/userDashboardInterface';



@Injectable({
  providedIn: 'root'
})
export class CommonServiceService {
  site : any;

  constructor(private http: HttpClient, private router: Router) { }

  loginUserURL = environment.loginUserURL;
  logoutUserURL = environment.logoutUserURL;
  createPostURL = environment.createPostURL;
  getAllPostURL = environment.getAllPostURL;

  loginUser(job: ILoginDetails): Observable<ILoginDetails> {
    return this.http.post<ILoginDetails>(this.loginUserURL, job);
  }

  logoutUser(job: ILoginDetails): Observable<ILoginDetails> {
    return this.http.post<ILoginDetails>(this.logoutUserURL, job);
  }

  createPost(job: IUserDashboardDetails): Observable<IUserDashboardDetails> {
    const roleType = localStorage.getItem('role_type');
      if (roleType === '1') {
        this.site = 'user';
      } else if (roleType === '2' || roleType === '3') {
        this.site = 'admin';
      }
      const headers = new HttpHeaders().set('site-user', this.site);
    return this.http.post<IUserDashboardDetails>(this.createPostURL, job, { headers: headers });
  }

  

  getAllPosts(){
    return this.http.get(this.getAllPostURL);
  }
  

  

  

  

  
}
