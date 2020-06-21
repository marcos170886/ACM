import 'package:acmsys/app/modules/appointments/appointments_controller.dart';
import 'package:acmsys/app/repositories/client_repository.dart';
import 'package:acmsys/app/stores/client_store.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:acmsys/app/modules/appointments/appointments_page.dart';

class AppointmentsModule extends ChildModule {
  @override
  List<Bind> get binds => [
        Bind((i) => ClientRepository(i.get())),
        Bind((i) => AppointmentsController(i.get<ClientRepository>())),
        Bind((i) => ClientStore())
      ];

  @override
  List<Router> get routers => [
        Router('/', child: (_, args) => AppointmentsPage()),
      ];

  static Inject get to => Inject<AppointmentsModule>.of();
}
