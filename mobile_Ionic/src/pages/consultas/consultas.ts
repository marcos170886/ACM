import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { NovoAgendamentoPage } from '../novo-agendamento/novo-agendamento';
import { ConsultaAgendadaPage } from '../consulta-agendada/consulta-agendada';


@Component({
  selector: 'page-consultas',
  templateUrl: 'consultas.html'
})
export class ConsultasPage {

  constructor(public navCtrl: NavController) {
  }
  goToNovoAgendamento(params){
    if (!params) params = {};
    this.navCtrl.push(NovoAgendamentoPage);
  }goToConsultaAgendada(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultaAgendadaPage);
  }goToConsultas(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultasPage);
  }
}
