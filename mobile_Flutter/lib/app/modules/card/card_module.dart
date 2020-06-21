import 'package:acmsys/app/modules/card/card_controller.dart';
import 'package:acmsys/app/modules/services/services_module.dart';
import 'package:acmsys/app/repositories/client_repository.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:acmsys/app/modules/card/card_page.dart';
import 'package:acmsys/app/repositories/service_repository.dart';
import 'package:acmsys/app/modules/services/services_controller.dart';


class CardModule extends ChildModule {
  @override
  List<Bind> get binds => [
        Bind((i) => CardController(i.get<ClientRepository>())),
        Bind((i) => ServiceRepository()),
        Bind((i) => ServicesController(i.get<ServiceRepository>())),
        
      ];

  @override
  List<Router> get routers => [
        Router('/', child: (_, args) => CardPage()),
        Router('/service', module: ServicesModule())
      ];

  static Inject get to => Inject<CardModule>.of();
}
