import 'package:acmsys/app/modules/home/home_controller.dart';
import 'package:acmsys/app/modules/register/register_controller.dart';
import 'package:acmsys/app/modules/register/register_module.dart';
import 'package:acmsys/app/repositories/client_repository.dart';
import 'package:acmsys/app/stores/client_store.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:acmsys/app/modules/home/home_page.dart';

class HomeModule extends ChildModule {
  @override
  List<Bind> get binds => [
        Bind((i) => HomeController(i.get<ClientRepository>())),
        Bind((i) => RegisterController(i.get<ClientRepository>())),
        Bind((i) => ClientRepository(i.get())),
        Bind((i) => ClientStore())
        
      ];

  @override
  List<Router> get routers => [
        Router('/home', child: (_, args) => HomePage()),
        Router( '/register', module: RegisterModule()),
      ];

  static Inject get to => Inject<HomeModule>.of();
}
