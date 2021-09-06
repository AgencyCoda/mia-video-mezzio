import { Injectable } from '@angular/core';
import { MiaVideo } from '../entities/mia_video';
import { MiaBaseCrudHttpService } from '@agencycoda/mia-core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MiaVideoService extends MiaBaseCrudHttpService<MiaVideo> {

  constructor(
    protected http: HttpClient
  ) {
    super(http);
    this.basePathUrl = environment.baseUrl + 'mia-video';
  }
 
}