use ChildDevSchool;

INSERT INTO Ancestors (NAME, NUMBER_PHONE, EMAIL)
VALUES ('Кулимова Нина Владиморовна', '89635632596', 'nina@mail.ru'),
      ('Шторин Никита Сергеевич','8963256951756' ,'nikita@mail.ru');

INSERT INTO Teachers (NAME, NUMBER_PHONE, EMAIL)
VALUES ('Тимошина Екатерина Евгеньевна', '89635632596', 'ekaterina@mail.ru'),
      ('Пятин Михаил Игоревич','8963256951756' ,'mihail@mail.ru');

INSERT INTO Children (NAME, NUMBER_PHONE,DATA_OF_BIRTH, EMAIL)
VALUES ('Кулимов Данил Сергеевич', '89635632596', '2001-01-01','danil@mail.ru'),
      ('Шторин Валерий Никитич','8963256951756' ,'2003-02-03','valeriy@mail.ru');

INSERT INTO Courses (NAME, DURATION, PLACE, COST)
VALUES ('Танцы', '24 часа', 'Екатеринбург, ул. Хохрякова, дом 55','16000'),
      ('Игра на гитаре. Основы','72 часа' ,'Екатеринбург, ул. Вайнера, дом 101','50000');

INSERT INTO Parents_Children (fk_PR, fk_CH)
VALUES (1, 1),
      (2, 2);

INSERT INTO Requests (NAME_PARENT, NUMBER_PHONE, EMAIL, fk_c)
VALUES ('Фонитов Григорий Емельянович', '89632563158', 'grigoriy@mail.ru','1'),
      ('Лукошкина Милана Игнатьевна','89625636597' ,'milana@mail.ru','2');

INSERT INTO Collectives (fk_CH, fk_CR)
VALUES (1, 1),
      (2, 2);

INSERT INTO Teachers_Courses (fk_T, fk_C)
VALUES (1, 1),
      (2, 2);

INSERT INTO Payments (DATA_OF_PAYMENT, fk_CH, fk_CR, COST)
VALUES ('2018-01-01',1, 1, 10000),
      ('2019-01-01',2, 2, 15000);

