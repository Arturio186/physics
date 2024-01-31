@extends('layouts.main')
@section('title', 'Руководство')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/management.css')}}" />
@endsection

@section('content')
    <div class="management-container">
        <h1>Руководство</h1>
        <div class="people">
            @foreach($managers as $manager)
                <div class="person">
                    <img src="{{ $manager->file_path }}" alt="Фото члена руководства"/>
                    <div class="text">
                        <p class="stuff">Президент «Федерации лапты города Тюмени»</p>
                        <p class="name">Бояров Иван Николаевич</p>
                        <p class="phone">Телефон: +79829663676</p>
                        <p class="email">E-mail: i.n.boyarov@utmn.ru</p>
                    </div>
                </div>
            @endforeach
            <div class="person">
                <img src="./images/management/ivan.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Президент «Федерации лапты города Тюмени»</p>
                    <p class="name">Бояров Иван Николаевич</p>
                    <p class="phone">Телефон: +79829663676</p>
                    <p class="email">E-mail: i.n.boyarov@utmn.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/management/evgeniy.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Исполнительный директор «Федерации лапты города Тюмени»</p>
                    <p class="name">Черепенин Евгений Владимирович</p>
                    <p class="phone">Телефон: +79129258227</p>
                    <p class="email">E-mail: e.v.cherepenin@utmn.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/management/ulia.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Секретарь «Федерации лапты города Тюмени»</p>
                    <p class="name">Путилова Юлия Олеговна</p>
                    <p class="phone">Телефон: +79088792271</p>
                    <p class="email">E-mail: Putilova013@mail.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/management/konstantin.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Председатель комиссии по развитию лапты в студенческой среде </p>
                    <p class="name">Федоров Константин Владимирович </p>
                    <p class="phone">Телефон: +79199305340</p>
                    <p class="email">E-mail: konstantin_fedorov_98@mail.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/management/s.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Председатель комиссии по развитию лапты в школьной среде</p>
                    <p class="name">Сидоров Николай Викторович</p>
                    <p class="phone">Телефон: +79829335199</p>
                    <p class="email">E-mail: n.v.sidorov@bk.ru</p>
                </div>
            </div>
            
        </div>
    </div>
@endsection
