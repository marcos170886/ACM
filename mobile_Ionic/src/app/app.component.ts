import { Component, ViewChild } from '@angular/core';
import { Platform, Nav } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { ConsultasPage } from '../pages/consultas/consultas';
import { NovoAgendamentoPage } from '../pages/novo-agendamento/novo-agendamento';
import { ConsultaAgendadaPage } from '../pages/consulta-agendada/consulta-agendada';
import { MinhasInformaEsPage } from '../pages/minhas-informa-es/minhas-informa-es';
import { LoginPage } from '../pages/login/login';
import { CadastroPage } from '../pages/cadastro/cadastro';
import { CadastradoPage } from '../pages/cadastrado/cadastrado';


import { MenuPage } from '../pages/menu/menu';



@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) navCtrl: Nav;
    rootPage:any = MenuPage;

  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen) {
    platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      statusBar.styleDefault();
      splashScreen.hide();
    });
  }
  goToConsultas(params){
    if (!params) params = {};
    this.navCtrl.setRoot(ConsultasPage);
  }goToNovoAgendamento(params){
    if (!params) params = {};
    this.navCtrl.setRoot(NovoAgendamentoPage);
  }goToConsultaAgendada(params){
    if (!params) params = {};
    this.navCtrl.setRoot(ConsultaAgendadaPage);
  }goToMinhasInformaEs(params){
    if (!params) params = {};
    this.navCtrl.setRoot(MinhasInformaEsPage);
  }goToLogin(params){
    if (!params) params = {};
    this.navCtrl.setRoot(LoginPage);
  }goToCadastro(params){
    if (!params) params = {};
    this.navCtrl.setRoot(CadastroPage);
  }goToCadastrado(params){
    if (!params) params = {};
    this.navCtrl.setRoot(CadastradoPage);
  }
}
