<?php

/* 
 * (с) 2011-2015 Грибов Павел
 * http://грибовы.рф * 
 * Если исходный код найден в сети - значит лицензия GPL v.3 * 
 * В противном случае - код собственность ГК Яртелесервис, Мультистрим, Телесервис, Телесервис плюс * 
 */

$md=new Tmod; // обьявляем переменную для работы с классом модуля

$this->Add("main","<img src=controller/client/themes/$cfg->theme/ico/chart_pie.png> Отчеты","Отчеты",3,"reports","");

$md=new Tmod; // обьявляем переменную для работы с классом модуля
// регистрируем модуль. Если он уже зарегистрирован, то повторно он не зарегистрируется
// по умолчанию зарегистрированный модуль выключен
// включить его можно из меню настроек
$md->Register("worktime", "Вход и выход работников организации (турникет Орион)", "Грибов Павел"); 
$md->Register("workandplans", "Оперативная обстановка на заводе", "Грибов Павел"); 
$md->Register("zabbix-mon", "Мониторинг dashboard серверов Zabbix", "Грибов Павел"); 
// Хотя можно его "включить и принудительно
//$md->Activate("ping")

if ($md->IsActive("workandplans")==1) {
  $this->Add("reports","Оперативная обстановка","Оперативная обстановка",3,"reports/workandplans","workandplans");    
  $this->Add("reports","Остатки продукции","Остатки продукции",3,"reports/sklad","sklad");    
  $this->Add("reports","Остатки комплектующих","Остатки комплектующих",3,"reports/kmp2","operreports/kmp2");    
  $this->Add("reports","Просроченные сертификаты","Просроченные сертификаты",3,"reports/sert","operreports/sert");    
};

if ($md->IsActive("worktime")==1) {
    $this->Add("reports","График работы","График работы",3,"reports/users_info","users_info");    
};
if ($md->IsActive("zabbix-mon")==1) {
    $this->Add("reports","Dashboard Zabbix","Dashboard Zabbix",3,"reports/zabbix_mon","zabbix_mon");        
};
$this->Add("reports","Размещение ТМЦ на карте","Размещение ТМЦ на карте",3,"reports/map","map");        

unset($md);