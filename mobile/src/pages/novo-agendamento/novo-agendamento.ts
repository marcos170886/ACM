import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ConsultaAgendadaPage } from '../consulta-agendada/consulta-agendada';
import { ConsultasPage } from '../consultas/consultas';


@Component({
  selector: 'page-novo-agendamento',
  templateUrl: 'novo-agendamento.html'
})
export class NovoAgendamentoPage {

  constructor(public navCtrl: NavController) {
  }
  goToConsultaAgendada(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultaAgendadaPage);
  }goToConsultas(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultasPage);
  }goToNovoAgendamento(params){
    if (!params) params = {};
    this.navCtrl.push(NovoAgendamentoPage);
  }
}
