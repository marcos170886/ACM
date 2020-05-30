import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LoginPage } from '../login/login';
import { ConsultasPage } from '../consultas/consultas';
import { NovoAgendamentoPage } from '../novo-agendamento/novo-agendamento';
import { ConsultaAgendadaPage } from '../consulta-agendada/consulta-agendada';
import { CadastroPage } from '../cadastro/cadastro';
import { CadastradoPage } from '../cadastrado/cadastrado';

@Component({
  selector: 'page-cadastrado',
  templateUrl: 'cadastrado.html'
})
export class CadastradoPage {

  constructor(public navCtrl: NavController) {
  }
  goToLogin(params){
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
  }goToCadastrado(params){
    if (!params) params = {};
    this.navCtrl.push(CadastradoPage);
  }
}
