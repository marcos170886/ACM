import 'package:acmsys/app/modules/card/card_controller.dart';
import 'package:acmsys/app/modules/card/card_module.dart';
import 'package:acmsys/app/modules/register/register_controller.dart';
import 'package:acmsys/app/repositories/client_repository.dart';
import 'package:acmsys/app/repositories/service_repository.dart';
import 'package:acmsys/app/stores/client_store.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:acmsys/app/modules/register/register_page.dart';

class RegisterModule extends ChildModule {
  @override
  List<Bind> get binds => [
        Bind((i) => RegisterController(i.get<ClientRepository>())),
        Bind((i) => ClientRepository(i.get())),
        Bind((i) => CardController(i.get<ClientRepository>())),
        Bind((i) => ServiceRepository()),
        Bind((i) => ClientStore())
      ];

  @override
  List<Router> get routers => [
        Router('/', child: (_, args) => RegisterPage()),
        Router('/card', module: CardModule())
      ];

  static Inject get to => Inject<RegisterModule>.of();
}
