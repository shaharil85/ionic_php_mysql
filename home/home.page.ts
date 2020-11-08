import { Component } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {LoadingController, ToastController} from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  constructor(public  http: HttpClient,
              public toastController:ToastController,
              public loadingController:LoadingController){}

  data_list = [];
  student_name:any='';
  student_id:any='';



  getlist(){
      if (this.student_name.length == 0) {
          this.showToast("Please insert student name..", "danger")
      }
      else {
          let prms: any = {student_name: this.student_name};

          //this.http.get('http://localhost/control/get-cart-list.php',{params:prms}).subscribe(data=>{
          this.http.get('http://localhost/control/get_list_data.php', {params: prms}).subscribe(data => {
              this.data_list = <Array<any>> data
              console.log(this.data_list);
          });
      }

  }

  async deletelist(){

      if (this.student_name.length == 0) {
          this.showToast("Please insert student name..", "danger")
      }
      else
      {
          const loading = await this.loadingController.create({
              message: 'Saving. Please wait..',
          });
          await loading.present();

          let prms:any = {student_name:this.student_name};
          this.http.get('http://localhost/control/delete_list_data.php',{params:prms}).subscribe(data=>{

          loading.dismiss();

          if(data["status"]==1)
          {
              this.showToast("Deleted","secondary");
              this.all_list();

          }
          else{
              this.showToast("Unable to Delete.","danger")
          }
          });
      }

  }

  async add() {

      if (this.student_name.length == 0) {
          this.showToast("Please insert student name..", "danger")
      }
      else {

          const loading = await this.loadingController.create({
              message: 'Saving. Please wait..',
          });
          await loading.present();

          let prms: any = {student_name: this.student_name};

          this.http.get('http://localhost/control/add_new_data.php', {params: prms}).subscribe(data => {

              loading.dismiss();
              if (data["status"] == 1) {
                  this.showToast("Saved", "secondary");
                  this.getlist();

              } else {
                  this.showToast("Unable to save.", "danger")
              }
          });
      }
  }

   all_list(){

        //this.http.get('http://localhost/control/get-cart-list.php',{params:prms}).subscribe(data=>{
        this.http.get('http://localhost/control/show_all_list_data.php').subscribe(data => {
            this.data_list = <Array<any>> data
            console.log(this.data_list);
        });


  }

  async showToast(msg,color)
  {
        const toast = await this.toastController.create({
            message: msg,
            duration: 2000,
            color:color
        });
        toast.present();
  }


}
