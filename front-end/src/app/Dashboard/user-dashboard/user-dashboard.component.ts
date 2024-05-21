import { Component, OnInit } from '@angular/core';
import { _MUserDashboardModal } from '../user-dashboard/Model/userDashboardClass';
import { IUserDashboardDetails } from '../user-dashboard/Model/userDashboardInterface';
import { CommonServiceService } from '../../Service/common-service.service';
import { Router } from '@angular/router';
import { FormBuilder,FormGroup,FormControl,Validators } from '@angular/forms';


@Component({
  selector: 'app-user-dashboard',
  templateUrl: './user-dashboard.component.html',
  styleUrls: ['./user-dashboard.component.scss']
})
export class UserDashboardComponent implements OnInit {
  userObj: _MUserDashboardModal = new _MUserDashboardModal();
  userForm: any = FormGroup;
  errorMsg: any = [];
  finalResult: any;

  constructor(private fb:FormBuilder,private service:CommonServiceService,private router:Router) { }

  ngOnInit(): void {    
    this.userObj = new _MUserDashboardModal();
    this.buildForm();
    this.finalResult;
  }

  buildForm() {
    this.userForm = this.fb.group({
      post: new FormControl('', Validators.required),
    });
  }


  createPost(){
    if ((this.userForm.value.post.length) !== 0) {
      this.userObj.post = this.userForm.value.post;
      this.service.createPost(this.userObj).subscribe((response: any) => {
          if (response.results.status_code == 200 && response.results.status == true ) {
            this.finalResult= response.results.data;

          }
        },
        (err :any) => {
          this.errorMsg = err.error.errors;
        });
    }

  }

  logOut(){
    if ((localStorage.getItem('access_token'))) {
      this.service.logoutUser(this.userObj).subscribe((response: any) => {
        localStorage.removeItem('access_token');
        localStorage.removeItem('role_type');
        localStorage.clear();
            this.router.navigate(['login']);
          
        });
    }

  }


}
