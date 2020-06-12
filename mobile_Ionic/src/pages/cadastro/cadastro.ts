import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { CadastradoPage } from '../cadastrado/cadastrado';
import { LoginPage } from '../login/login';
import { ConsultasPage } from '../consultas/consultas';
import { NovoAgendamentoPage } from '../novo-agendamento/novo-agendamento';
import { ConsultaAgendadaPage } from '../consulta-agendada/consulta-agendada';


@Component({
  selector: 'page-cadastro',
  templateUrl: 'cadastro.html'
})
export class CadastroPage {

  constructor(public navCtrl: NavController) {
  }
  goToCadastrado(params){
    if (!params) params = {};
    this.navCtrl.push(CadastradoPage);
  }goToLogin(params){
    if (!params) params = {};
    this.navCtrl.push(LoginPage);
  }goToConsultas(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultasPage);
  }goToNovoAgendamento(params){
    if (!params) params = {};
    this.navCtrl.push(NovoAgendamentoPage);
  }goToConsultaAgendada(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultaAgendadaPage);
  }goToCadastro(params){
    if (!params) params = {};
    this.navCtrl.push(CadastroPage);
  }
}
