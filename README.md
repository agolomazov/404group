# Тестовое задание

Требуется  разработать  простую  систему  для  работы  с  реестром  студентов. Система  должна  позволять  вносить  студентов  в  базу  данных  и  просматривать сформированный список. 
 
Данные,  которые  заполняются при добавлении студента: имя, фамилия, учебная группа, дата рождения, email, IP адрес и время регистрации. 
 
Просмотр списка студентов предполагает вывод вышеописанных данных, а также списка предметов и оценок по ним для каждого студента, средний балл по всем предметам (одно  число, 2 знака после запятой), номер семестра, характеристика научного руководителя (если таковая имеется). 
 
Сделать отдельную сводную таблицу, в которой будут отображаться 10 студентов с наивысшим средним баллом. 

**Требования к разработке**: 
* все запросы к серверу должны работать асинхронно, никакие действия не должны 
вести к перезагрузке страницы; 
* для реализации клиентской части допускается использовать jQuery и/или простой 
JS.

**Требования и особенности, которые надо учесть при дизайне схемы данных**: 
* студентов будет много (порядка 1­2 млн. записей); 
* запись в таблицы с данными будет вестись в конкурентом режиме доступа; 
* студенты могут часто переходить из одной группы в другую; 
* предполагаются частые выборки по фильтрам (включая комбинации из фамилии, группы, семестра и среднего балла). 
 
**Также необходимо написать следующие выборки для поиска в базе данных (достаточно отдельного SQL­файла с текстами запросов)**: 
* однокурсников со средним баллом от .. до .., и именем ```%name%```; 
* всех людей, c IP которых произошло более одной регистрации, и при этом хотя бы у одного из них должна быть написана характеристика научного руководителя. 

Дизайном  и  визуальным  оформлением можно пренебречь. Язык реализации ­ на усмотрение. Фреймворки использовать нельзя. База данных: MySQL или PostgreSQL. 
 
Необходимо  прислать:  код  системы,  инструкцию  для  запуска,  SQL  схему  базы данных, файл с SQL­запросами для описанных выше поисковых выборок. Срок выполнения: 2­3 дня.

### Установка

1. Клонировать репозиторий ```git clone URL ```.
2. Выполните в терминале команду ```composer install```
3. Создайте БД в MySQL.
4. Откройте файл ```./config.php``` и укажите настройки подключения к БД
5. Откройте файл ```./phinx.yml``` и укажите настройки подключения к БД
6. Выполните в терминале команду ```php composer/vendor/bin/phinx migrate```
7. Последовательно выполните следующие команды:
    * ```phinx seed:run -s SubjectSeed```
    * ```phinx seed:run -s ListSemesters```
    * ```phinx seed:run -s ScientificDirectors```
    * ```phinx seed:run -s LearningYears```
    * ```phinx seed:run -s GroupsList```
    * ```phinx seed:run -s GroupYears```
    * ```phinx seed:run -s StudentsList```
    * ```phinx seed:run -s GroupStudents```
    * ```phinx seed:run -s SubjectsForStudents```
    * ```phinx seed:run -s LessonsSeed```