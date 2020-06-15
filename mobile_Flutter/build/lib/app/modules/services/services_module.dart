import 'package:acmsys/app/modules/services/services_controller.dart';
import 'package:acmsys/app/repositories/service_repository.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:acmsys/app/modules/services/services_page.dart';

class ServicesModule extends ChildModule {
  @override
  List<Bind> get binds => [
        Bind((i) => ServicesController(i.get<ServiceRepository>())),
      ];

  @override
  List<Router> get routers => [
        Router('/', child: (_, args) => ServicesPage()),
      ];

  static Inject get to => Inject<ServicesModule>.of();
}
