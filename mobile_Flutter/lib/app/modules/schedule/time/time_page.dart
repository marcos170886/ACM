import 'package:acmsys/app/components/shared_widgets.dart';
import 'package:acmsys/app/models/make_schedule_client_model.dart';
import 'package:acmsys/app/models/make_schedule_professional_model.dart';
import 'package:acmsys/app/models/recover_client_model.dart';
import 'package:acmsys/app/models/scheduled_model.dart';
import 'package:acmsys/app/modules/schedule/schedule_controller.dart';
import 'package:flutter/material.dart';
import 'package:flutter_mobx/flutter_mobx.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:gradient_app_bar/gradient_app_bar.dart';

class TimePage extends StatefulWidget {
  final String title;
  final String nameOfProfession;
  const TimePage({Key key, this.title = "Time", this.nameOfProfession})
      : super(key: key);

  @override
  _TimePageState createState() => _TimePageState();
}

class _TimePageState extends ModularState<TimePage, ScheduleController> {
  var recoverClient = RecoverClientModel();

  final GlobalKey<ScaffoldState> _scaffoldkey = new GlobalKey<ScaffoldState>();



  @override
  Widget build(BuildContext context) {
    return Scaffold(
        key: _scaffoldkey,
        backgroundColor: Color.fromARGB(255, 203, 236, 241),
        appBar: GradientAppBar(
          actions: <Widget>[
            RaisedButton(
              onPressed: _alertCancel,
              child: Text('Cancelar!'),
            )
          ],
          title: Text('Agendamento'),
          
          gradient:
              LinearGradient(colors: [Color(0xFF00A1FD), Color(0xFF98FDBB)]),
        ),
        body: Center(
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: <Widget>[
                FutureBuilder(
                  future: controller.getScheduledTime(
                      '${controller.schedule.usDate}',
                      '${controller.professional.id}'),
                  builder: (BuildContext context, AsyncSnapshot snapshot) {
                    switch (snapshot.connectionState) {
                      case ConnectionState.active:
                      case ConnectionState.waiting:
                        return Components.loading();
                        break;
                      case ConnectionState.none:
                        return Components.error("No connection has been made");
                        break;
                      case ConnectionState.done:
                        if (snapshot.hasError) {
                          return Components.error(snapshot.error.toString());
                        }
                        if (!snapshot.hasData) {
                          return Components.error("No data");
                        } else {
                          return Container(
                            //height: MediaQuery.of(context).size.width * 0.5,
                            child: Column(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: <Widget>[
                                dropDownMenu(snapshot.data),
                                SizedBox(
                                  height:
                                      MediaQuery.of(context).size.width * 0.07,
                                ),
                              ],
                            ),
                          );
                        }
                        break;
                    }
                  },
                ),
              ],
            ),
          ),
        ));
  }

  Widget dropDownMenu(List<ScheduledModel> time) {
    return Padding(
      padding: const EdgeInsets.all(15.0),
      child: Card(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(15.0),
        ),
        color: Color(0xFFE0F7F7),
        child: Column(
          children: <Widget>[
            Padding(
              padding: const EdgeInsets.fromLTRB(0, 15, 0, 15),
              child: Container(
                child: Text(
                  'Data escolhida: ${controller.schedule.brDate}',
                  textAlign: TextAlign.left,
                  style: TextStyle(fontSize: 20, fontFamily: 'Arial'),
                ),
              ),
            ),
            Components.divider(),
            Observer(builder: (_) {
              return DropdownButtonHideUnderline(
                child: DropdownButton(
                    items: time.map((item) {
                      return new DropdownMenuItem(
                        child: SizedBox(
                          width: MediaQuery.of(context).size.width * 0.7,
                          child: Text(
                            item.time,
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              fontFamily: 'Nunito',
                              fontSize: 15,
                            ),
                          ),
                        ),
                        value: item.time,
                      );
                    }).toList(),
                    hint: Center(
                      child: Text("Escolha o horário",
                          textAlign: TextAlign.center,
                          style: TextStyle(
                              fontSize: 20,
                              color: Colors.black,
                              fontFamily: 'Arial')),
                    ),
                    onChanged: (_) async {
                      controller.schedule.setTime(_);
                      controller.makeScheduleClient.setScheduletime(_);
                    },
                    value: controller.schedule.time),
              );
            }),
            Components.divider(),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Observer(builder: (_) {
                return Padding(
                  padding: const EdgeInsets.all(15.0),
                  child: Container(
                    child: Text(
                      controller.schedule.time == null
                          ? ''
                          : 'Horário escolhido: ${controller.schedule.time}',
                      style: TextStyle(fontSize: 20, fontFamily: 'Arial'),
                    ),
                  ),
                );
              }),
            ),
            Components.divider(),
            Observer(
              builder: (_) {
                return RaisedButton(
                  color: Color(0xFF02F7F7),
                  onPressed: controller.schedule.isTimeValid
                      ? () {
                          var data = MakeScheduleClientModel(
                              date: controller.makeScheduleClient.date,
                              time: controller.makeScheduleClient.time,
                              professionalName: controller
                                  .makeScheduleClient.professionalName,
                              serviceName: widget.nameOfProfession);

                          var data2 = MakeScheduleProfessionalModel(
                            date: controller.makeScheduleClient.date,
                            time: controller.makeScheduleClient.time,
                          );

                          // CONFIRMAÇÃO DO USUÁRIO!
                          _alert(data, data2);
                        }
                      : null,
                  child: Text('FINALIZAR'),
                );
              },
            )
          ],
        ),
      ),
    );
  }

  Future _alert(
      MakeScheduleClientModel data, MakeScheduleProfessionalModel data2) {
    return showDialog(
        context: context,
        barrierDismissible: false,
        builder: (_) {
          return AlertDialog(
            title: Text("CONFIRMAR DADOS"),
            content: Column(
              mainAxisSize: MainAxisSize.min,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: <Widget>[
                Container(
                  child: Text(
                      'Profissional: ${controller.professional.professionalName}\nData: ${controller.schedule.brDate}\nHorário: ${controller.schedule.time}'),
                ),
              ],
            ),
            actions: <Widget>[
              FlatButton(
                  onPressed: () {
                    Navigator.of(context).pop();
                  },
                  child: Text("Cancelar")),
              FlatButton(
                  onPressed: () {
                    controller.makeSchedule(data);
                    controller.makeScheduleProfessional(
                        data2, controller.professional.id.toString());
                    Navigator.of(context).pop();
                    Components.showSnackBar("Horário marcado com sucesso!", _scaffoldkey);
                    Future.delayed(Duration(seconds: 2)).then((_) {
                      Modular.to.pushNamedAndRemoveUntil(
                          '/card', ModalRoute.withName('/'));
                    });
                  },
                  child: Text("Confirmar"))
            ],
          );
        });
  }

  Future _alertCancel() {
    return showDialog(
        context: context,
        barrierDismissible: false,
        builder: (_) {
          return AlertDialog(
            title: Text("CANCELAR HORÁRIO"),
            content: Column(
              mainAxisSize: MainAxisSize.min,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: <Widget>[
                Container(
                  child: Text(
                      "Você realmente deseja sair? Seu horário ainda não foi marcado!"),
                ),
              ],
            ),
            actions: <Widget>[
              FlatButton(
                  onPressed: () {
                    Navigator.of(context).pop();
                  },
                  child: Text("Continuar")),
              FlatButton(
                  onPressed: () {
                    Modular.to.pushNamedAndRemoveUntil(
                        '/card', ModalRoute.withName('/'));
                  },
                  child: Text("Sair"))
            ],
          );
        });
  }
}
