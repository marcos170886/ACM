import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { LoginPage } from '../pages/login/login';
import { ConsultasPage } from '../pages/consultas/consultas';
import { CadastroPage } from '../pages/cadastro/cadastro';
import { TabsControllerPage } from '../pages/tabs-controller/tabs-controller';
import { CadastradoPage } from '../pages/cadastrado/cadastrado';
import { ConsultaAgendadaPage } from '../pages/consulta-agendada/consulta-agendada';
import { MinhasInformaEsPage } from '../pages/minhas-informa-es/minhas-informa-es';
import { NovoAgendamentoPage } from '../pages/novo-agendamento/novo-agendamento';
import { MenuPage } from '../pages/menu/menu';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

@NgModule({
  declarations: [
    MyApp,
    LoginPage,
    ConsultasPage,
    CadastroPage,
    TabsControllerPage,
    CadastradoPage,
    ConsultaAgendadaPage,
    MinhasInformaEsPage,
    NovoAgendamentoPage,
    MenuPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    LoginPage,
    ConsultasPage,
    CadastroPage,
    TabsControllerPage,
    CadastradoPage,
    ConsultaAgendadaPage,
    MinhasInformaEsPage,
    NovoAgendamentoPage,
    MenuPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}