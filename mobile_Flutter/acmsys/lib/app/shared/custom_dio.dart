import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:flutter_modular/flutter_modular.dart';
import 'package:shared_preferences/shared_preferences.dart';

class CustomDio {
  var _dio;

  CustomDio() {
    _dio = Dio();
    _dio.interceptors
        .add(InterceptorsWrapper(onRequest: _onRequest, onError: _onError));
  }

  CustomDio.withAuthentication() {
    _dio = Dio();
    _dio.interceptors
        .add(InterceptorsWrapper(onRequest: _onRequest, onError: _onError));
  }

  _onError(DioError e) async {
    if (e.response.statusCode == 401) {
      SharedPreferences prefs = await SharedPreferences.getInstance();
      prefs.clear();
      prefs.commit();
      Modular.to.pushNamedAndRemoveUntil('/', ModalRoute.withName('/'));
    }

    return e.type;
  }

  Dio get instance => _dio;

  _onRequest(RequestOptions options) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    var token = prefs.get('token');
    options.headers['Authorization'] = "Bearer $token";
    options.headers['Accept'] = 'application/json';
  }
}
