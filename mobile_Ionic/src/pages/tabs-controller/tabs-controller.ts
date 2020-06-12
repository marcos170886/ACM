import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ConsultasPage } from '../consultas/consultas';
import { NovoAgendamentoPage } from '../novo-agendamento/novo-agendamento';
import { ConsultaAgendadaPage } from '../consulta-agendada/consulta-agendada';


@Component({
  selector: 'page-tabs-controller',
  templateUrl: 'tabs-controller.html'
})
export class TabsControllerPage {

  tab1Root: any = ConsultasPage;
  constructor(public navCtrl: NavController) {
  }
  goToConsultas(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultasPage);
  }goToNovoAgendamento(params){
    if (!params) params = {};
    this.navCtrl.push(NovoAgendamentoPage);
  }goToConsultaAgendada(params){
    if (!params) params = {};
    this.navCtrl.push(ConsultaAgendadaPage);
  }
}
