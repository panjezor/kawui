@extends('layouts.app', ['activePage' => 'to-do-list', 'titlePage' => __('To do list')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category"> zapierdalaj gnoju</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="#" class="btn btn-sm btn-primary">dodawanie rzeczy?</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                id
                                            </th>
                                            <th>
                                                text
                                            </th>
                                            <th class="text-right">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['zrobi przyklad na podstawie nmapu', 'stworzyc bazowy proces symfony z joba','posiadanie uzytkownikow i zarzadzanie nimi','aktualna kolejka wraz z tym co zlecil user?','webhooki?','uprawnienia'] as $key=>$todo)
                                            <tr>
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    {{$todo}}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="#"
                                                       data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                        EDIT THIS MOTHERFUCKER
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Notatki</h4>
                            <p class="card-category"> zapierdalaj gnoju</p>
                        </div>
                        <div class="card-body">Panel po lewej powinien miec:
                            <ul>
                                <li>Uzytkownikow:
                                    <ul>
                                        <li>liste uzytkownikow w teamie?</li>
                                        <li>zmiane profilu/maila</li>
                                    </ul>
                                </li>
                                <li>Liste aktualnych jobow, kiedy sie dodaly, kiedy je zaczeto</li>
                                <li>System uprawnien? np. dawanie ludziom odpalac terminal albo uprawnienie na program
                                </li>
                                <li>Panel ze wszystkimi programami (najlepiej ukategoryzowane)</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
